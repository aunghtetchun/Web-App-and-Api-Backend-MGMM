<?php

namespace App\Http\Controllers;
use Goutte\Client;
use Illuminate\Http\Request;
use App\Category;
use App\Photo;
use App\Post;
use App\Website;
use App\Post_category;

class ScraperController extends Controller
{
    public function crawlGameApkaward($url)
    {
        $client = new Client();

        $website = $client->request('GET', $url);

        $links = $website->filter('a')->each(function ($node) {
            // Extract the URL from the onclick attribute
            preg_match('/\'(https:\/\/[^\\\']+)\'/', $node->attr('onclick'), $matches);

            // Return the extracted URL if it exists
            return isset($matches[1]) ? $matches[1] : null;
        });

        // Remove null values from the array
        $links = array_filter($links);

        $imageSrcValues = $website->filter('.image-x img')->each(function ($node) {
            return $node->attr('src');
        });

        $gameTitles = $website->filter('.sing a')->text();
        

        $logo = $website->filter('.pic img')->attr('src');
        $description = $website->filter('.more-show')->html();
        $modFeatures=$website->filter('.emo')->text();
        $additionalInformation = [];

        $website->filter('.more-post.addinfo ul.row li')->each(function ($node) use (&$additionalInformation) {
            $strongText = $node->filter('strong')->text();
            $spanText = $node->filter('span')->text();

            // Customize this part based on the actual structure of your HTML
            switch ($strongText) {
                case 'Updated':
                case 'Requires Android':
                case 'Mobile Testing':
                case 'Current Version':
                case 'Developer':
                    $additionalInformation[$strongText] = $spanText;
                    break;
                case 'Get it on':
                    // Handle "Get it on" differently if needed
                    $additionalInformation[$strongText] = $spanText;
                    break;
                case 'Report':
                    // Handle "Report" differently if needed
                    $additionalInformation[$strongText] = $spanText;
                    break;
            }
        });

        $link_names = [];

        $website->filter('.like-apk-file i.mode')->each(function ($node) use (&$link_names) {
            $modText = $node->text();
            $link_names[] = $modText;
        });
        // $game=[];
        // $game->title=$gameTitles;
        // $game->features=$modFeatures;
        // $game->logo=$logo;
        // $game->images=$imageSrcValues;
        // $game->description=$description;
        // $game->links=$links;
        // $game->link_names=$link_names;
        // $game->info=$additionalInformation;
        return response()->json(['title'=> $gameTitles,'features'=>$modFeatures,'logo' => $logo,'info'=>$additionalInformation,'images' => $imageSrcValues,'links' => $links,'url_name'=>$link_names,'descriptions'=>$description]);

    }
    public function addGame(){
        return view('crawler.create');
    }
    public function storeGame(Request $request){
        if(Website::where('url',$request->url)->exists()){
            return redirect()->route("scraper.gameList")->with("toast","Game Crawl Successful");
        }
        $fullUrl=$request->website.$request->url;
        $game=$this->crawlGameApkaward($fullUrl);
        $game= $game->original;
        // return $game;
        $post=new Post();       
        $post->name=$game['title'];
        $post->logo = $game['logo'];
        $post->type=$game['info']['Mobile Testing'];
        $post->user_id=auth()->user()->id;
        $post->category_id=$request->category_id;
        $post->updated=$game['info']['Updated'];
        $post->new=2;
        $post->size='unknown';
        $post->crawl_url=$request->website;
        $post->keywords=strtolower($game['title']);
        $post->version=$game['info']['Current Version'];
        $post->requirement=$game['info']['Requires Android'];
        $post->developer=$game['info']['Developer'];
        $post->features=$game['features'];
        $post->video=$request->video;
        $post->description=$game['descriptions'];
        $links = array_values($game['links']);
        // Get the first image URL (index 0)
        $link1 = isset($links[0]) ? $links[0] : null;
        // Check if the first image URL is available
        if ($link1) {
            $post->link1=$link1;
        }
        $link2 = isset($links[1]) ? $links[1] : null;
        if ($link2) {
            $post->link2=$link2;
        }
        $link3 = isset($links[2]) ? $links[2] : null;
        if ($link3) {
            $post->link3=$link3;
        }
        $names = $game['url_name'];
        // Get the first image URL (index 0)
        $name_1 = isset($names[0]) ? $names[0] : null;
        // Check if the first image URL is available
        if ($name_1) {
            $post->name_1=$name_1;
        }
        $name_2 = isset($names[1]) ? $names[1] : null;
        if ($name_2) {
            $post->name_2=$name_2;
        }
        $name_3 = isset($names[2]) ? $names[2] : null;
        if ($name_3) {
            $post->name_3=$name_3;
        }
        $post->save();

        Post_category::where('post_id',$post->id)->delete();
        foreach ($request['tag_id'] as $t){
            $tag=new Post_category();
            $tag->post_id = $post->id;
            $tag->category_id = $t;
            $tag->save();
        }

        $imageUrls = $game['images'];
        // Loop through the image URLs and store them in the database
        foreach ($imageUrls as $imageUrl) {
            $photo = new Photo();
            $photo->name = $imageUrl;
            $aa=Post::get()->last();
            $photo->post_id=$aa->id;
            $photo->save();
        }
        $website=new Website();
        $website->site=$request->website;
        $website->url=$request->url;
        $website->type="game";
        $website->post_id=$post->id;
        $website->save();

        return redirect()->route("scraper.gameList")->with("toast","ဂိမ်းတင်ခြင်းအောင်မြင်ပါတယ်...");
    }
    public function gameList(){
        $posts=Post::whereNotNull('crawl_url')->get();
        return view('crawler.index',compact('posts'));
    }
    public function updateGame(){
        $website=Website::get();
        foreach($website as $w){
            $fullUrl=$w->site.$w->url;
            $game=$this->crawlGameApkawardUpdate($fullUrl);
            $game= $game->original;
            $post=Post::find($w->post_id);
            $post->updated=$game['info']['Updated'];
            $post->version=$game['info']['Current Version'];
            $post->requirement=$game['info']['Requires Android'];
            $post->developer=$game['info']['Developer'];
            $post->features=$game['features'];
            $links = array_values($game['links']);
            $link1 = isset($links[0]) ? $links[0] : null;
            if ($link1) {
                $post->link1=$link1;
            }else{
                $post->link1=null;
            }
            $link2 = isset($links[1]) ? $links[1] : null;
            if ($link2) {
                $post->link2=$link2;
            }else{
                $post->link2=null;
            }
            $link3 = isset($links[2]) ? $links[2] : null;
            if ($link3) {
                $post->link3=$link3;
            }else{
                $post->link3=null;
            }
            $names = $game['url_name'];
            $name_1 = isset($names[0]) ? $names[0] : null;
            if ($name_1) {
                $post->name_1=$name_1;
            }
            $name_2 = isset($names[1]) ? $names[1] : null;
            if ($name_2) {
                $post->name_2=$name_2;
            }
            $name_3 = isset($names[2]) ? $names[2] : null;
            if ($name_3) {
                $post->name_3=$name_3;
            }
            $post->update();
        }
        return redirect()->route("scraper.gameList")->with("toast","ဂိမ်းအားလုံး Updte လုပ်ပြီးပါပြီ...");        
    }
    public function crawlGameApkawardUpdate($url)
    {
        $client = new Client();

        $website = $client->request('GET', $url);

        $links = $website->filter('a')->each(function ($node) {
            preg_match('/\'(https:\/\/[^\\\']+)\'/', $node->attr('onclick'), $matches);
            return isset($matches[1]) ? $matches[1] : null;
        });
        // Remove null values from the array
        $links = array_filter($links);

        $modFeatures=$website->filter('.emo')->text();
        $additionalInformation = [];

        $website->filter('.more-post.addinfo ul.row li')->each(function ($node) use (&$additionalInformation) {
            $strongText = $node->filter('strong')->text();
            $spanText = $node->filter('span')->text();

            // Customize this part based on the actual structure of your HTML
            switch ($strongText) {
                case 'Updated':
                case 'Requires Android':
                case 'Mobile Testing':
                case 'Current Version':
                case 'Developer':
                    $additionalInformation[$strongText] = $spanText;
                    break;
                case 'Get it on':
                    // Handle "Get it on" differently if needed
                    $additionalInformation[$strongText] = $spanText;
                    break;
                case 'Report':
                    // Handle "Report" differently if needed
                    $additionalInformation[$strongText] = $spanText;
                    break;
            }
        });

        $link_names = [];

        $website->filter('.like-apk-file i.mode')->each(function ($node) use (&$link_names) {
            $modText = $node->text();
            $link_names[] = $modText;
        });
       
        return response()->json(['features'=>$modFeatures,'info'=>$additionalInformation,'links' => $links,'url_name'=>$link_names]);

    }
public function test2()
{
    $client = new Client();

    $website = $client->request('GET', 'https://dikgames.com/wild-life/');
    return $website->html();
}
}
