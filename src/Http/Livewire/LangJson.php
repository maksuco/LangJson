<?php

namespace App\Http\Livewire;

use Livewire\Component;

class LangJson extends Component
{
			public $groups = [];

				public function mount()
				{
						ray()->clearAll();
						$this->groups = json_decode('[
								{"id":1,"label":"Michael","tasks":[
										{"id":1233,"title":"First row"},
										{"id":12,"title":"Second Michael row"}
								]},
								{"id":4,"label":"Gina","tasks":[
										{"id":133,"title":"Super row"},
										{"id":445,"title":"Max row"}
								]}
						]', true);
				}


				public function updateGroupOrder($orderIds)
				{
						ray($this->groups);
						ray($orderIds,'updateGroupOrder');
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
