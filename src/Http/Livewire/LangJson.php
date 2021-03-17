<?php

namespace App\Http\Livewire;

use Livewire\Component;

class LangJson extends Component
{
			public $groups = [];
			pulic $searchResults = [];

			public function mount()
			{
				
			}


				public function search($term)
				{
					
					function search_array($this->array, $term) {
						foreach ($array AS $key => $value) {
							if (stristr($key, $term) === FALSE AND stristr($value, $term) === FALSE) {
								continue;
							} else {
										$results[] = (string) $key;
							}
						}
						return $results;
					}
					$this->searchResults = $results;
					
				}


				public function updateTaskOrder($orderIds)
				{
						ray($orderIds,'updateTaskOrder');
				}


		public function render()
		{
				return view('livewire.groups-test');
		}
}
