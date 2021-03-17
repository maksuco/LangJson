<?php
namespace Maksuco\LangJson\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class LangJsonController extends Controller
{
	public function index()
	{
		$langs = config('langjson.lang_files');
		if(!auth()->check() OR auth()->user()->id != config('langjson.admin_id')){
			return redirect('/');
		}
		$errors_name = [];
		$all_keys = [];
		$diff_keys_with_files = [];
		$app_files = $this->getTranslationsFromFiles();
		
		foreach($langs as $lang){
			$file_data = Storage::createLocalDriver(['root' => base_path('resources/lang')])->get($lang.'.json');
			$files[$lang] = json_decode($file_data,true);
			$diff_keys_with_files[$lang] = array_diff_key($array1, $app_files);
		}
		
		
		return json($diff_keys_with_files);

		
		////$rootPath = '/your/absolute/path';
		////dd($files,$errors_name);
		//foreach($files as $file){
		//	$words = Storage::disk('resources')->get($file);
		//	$words = json_decode($words,true);
		//	//$errors_name = $file.'_errors';
		//	dd($words);
		//	foreach($words as $key => $value){
		//		if(array_key_exists($key,$words)){} else {
		//			$errors_name[] = $key;
		//		}
		//	}
		//}
		//dd($words,$langs,$scan);

		return view('langJsonViews::dashboard', compact('langs','files','$app_files'));
	}

	private function getTranslationsFromFiles()
	{
		$allMatches = [];
    $regex = "#__\(\'(.*?)\'#";
		$disk = Storage::createLocalDriver(['root' => base_path('resources/views')]);
		foreach($disk->allFiles('') as $file) {
			$file_content = $disk->get($file);
			preg_match_all($regex, $file_content, $matches);
			$allMatches = array_merge($allMatches,$matches[1]);
		}
		$disk = Storage::createLocalDriver(['root' => base_path('config')]);
		foreach($disk->allFiles('') as $file) {
			$file_content = $disk->get($file);
			preg_match_all($regex, $file_content, $matches);
			$allMatches = array_merge($allMatches,$matches[1]);
		}
		$disk = Storage::createLocalDriver(['root' => base_path('app')]);
		foreach($disk->allFiles('') as $file) {
			$file_content = $disk->get($file);
			preg_match_all($regex, $file_content, $matches);
			$allMatches = array_merge($allMatches,$matches[1]);
			$filenames[] = $file;
		}
			//dd($file,$filenames,$allMatches,$matches);
		$disk = Storage::createLocalDriver(['root' => base_path('public/'.config('langjson.assets'))]);
		foreach($disk->allFiles('') as $file) {
			$file_content = $disk->get($file);
			preg_match_all($regex, $file_content, $matches);
			$allMatches = array_merge($allMatches,$matches[1]);
		}

		return collect($allMatches)->unique()->sort()->values()->all();
	}
	
	public function post(Request $request)
	{
		$langs = config('langjson.lang_files');
		foreach($langs as $lang){
			Storage::createLocalDriver(['root' => base_path('resources/lang')])->put($lang.'.json', request()->$lang);
		}
		return redirect(route('langjson'));
	}


}