<?php

namespace App\Http\Livewire;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Livewire\Component;
use Src\Translations\Application\ListAcceptedLanguagesHandle;
use Src\Translations\Application\ListGroupsHandle;
use Src\Translations\Application\SearchTranslationsHandle;

class ListTranslations extends Component
{
    public $group;
    public $query;

    private $searchTranslationsHandle;
    private $listAcceptedLanguagesHandle;
    private $listGroupsHandle;

    public function boot(
        SearchTranslationsHandle $searchTranslationsHandle,
        ListAcceptedLanguagesHandle $listAcceptedLanguagesHandle,
        ListGroupsHandle $listGroupsHandle
    )
    {
        $this->searchTranslationsHandle = $searchTranslationsHandle;
        $this->listAcceptedLanguagesHandle = $listAcceptedLanguagesHandle;
        $this->listGroupsHandle = $listGroupsHandle;

    }

    public function mount()
    {

    }

    public function render()
    {
        $locales = $this->paginate($this->searchTranslationsHandle->execute($this->group, $this->query));
        $acceptedLanguages = $this->listAcceptedLanguagesHandle->execute();
        $groups = $this->listGroupsHandle->execute();
        return view('livewire.list', compact("locales", "groups", "acceptedLanguages"));
    }


    /**
     * @param $items
     * @param int $perPage
     * @param null $page
     * @param array $options
     * @return LengthAwarePaginator
     */
    private function paginate($items, int $perPage = 10, int $page = null, $options = []): LengthAwarePaginator
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }
}
