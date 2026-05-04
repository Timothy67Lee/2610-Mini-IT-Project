<?php

use Livewire\Component;

new class extends Component
{
    //
};
?>

<div>
    class GlobalSearch extends Component {
    public $query = '';
    public $clubs = [];
    
    public function updatedQuery() {
        $this->clubs = Club::where('name', 'LIKE', "%{$this->query}%")
            ->limit(10)->get();
    }
    
    public function render() { return view('livewire.global-search'); }
}
</div>