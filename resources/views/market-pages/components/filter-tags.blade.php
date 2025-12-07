@php
    $selectedTags = request()->get('tags', []);
    $tags = \App\Models\Tag::all(['id', 'Name', 'color'])
        ->map(fn($t) => [
            'id' => $t->id,
            'name' => $t->Name,
            'color' => $t->color,
        ])
        ->toArray();

    $selectedTagsData = collect($tags)
        ->whereIn('id', $selectedTags)
        ->values()
        ->toArray();
@endphp

<form method="GET" action="{{ route('products.index') }}" class="mb-6 relative" x-data="tagFilter()">
    <label class="block text-gray-700 dark:text-gray-300 mb-2 font-medium">
        Filter by Tags
    </label>

    <div class="flex flex-wrap gap-2 mb-2">
        <template x-for="tag in selected" :key="tag.id">
            <div class="flex items-center px-2 py-1 rounded-full text-sm"
                 :style="`background-color: ${tag.color}; color: ${getContrastColor(tag.color)}`">
                <span x-text="tag.name"></span>
                <button type="button" @click="removeTag(tag)" class="ml-1">&times;</button>
                <input type="hidden" :name="'tags[]'" :value="tag.id">
            </div>
        </template>
    </div>

    <input
        type="text"
        placeholder="Start typing a tag..."
        x-model="query"
        @input="filterTags()"
        class="w-full border border-gray-300 dark:border-gray-600 rounded-lg p-2 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-blue-500 focus:outline-none"
    >

    <ul x-show="filtered.length > 0" x-cloak
        class="absolute z-50 w-full mt-1 max-h-60 overflow-auto border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-800 shadow-lg">
        <template x-for="tag in filtered" :key="tag.id">
            <li @click="selectTag(tag)"
                class="cursor-pointer px-3 py-2 hover:opacity-80"
                :style="`background-color: ${tag.color}; color: ${getContrastColor(tag.color)}`">
                <span x-text="tag.name"></span>
            </li>
        </template>
    </ul>

    <button type="submit"
            class="mt-2 px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg font-medium transition">
        Apply Filter
    </button>
</form>

<script>
    function tagFilter() {
        return {
            query: '',
            selected: @json($selectedTagsData),
            allTags: @json($tags),
            filtered: [],
            filterTags() {
                if (!this.query) {
                    this.filtered = [];
                    return;
                }
                const q = this.query.toLowerCase();
                this.filtered = this.allTags.filter(tag =>
                    tag.name.toLowerCase().includes(q) &&
                    !this.selected.find(t => t.id === tag.id)
                );
            },
            selectTag(tag) {
                this.selected.push(tag);
                this.query = '';
                this.filtered = [];
            },
            removeTag(tag) {
                this.selected = this.selected.filter(t => t.id !== tag.id);
            },
            getContrastColor(hex) {
                if (!hex) return '#000';
                hex = hex.replace('#','');
                if(hex.length === 3) hex = hex.split('').map(h => h+h).join('');
                const r = parseInt(hex.substr(0,2),16);
                const g = parseInt(hex.substr(2,2),16);
                const b = parseInt(hex.substr(4,2),16);
                const lum = (0.299*r + 0.587*g + 0.114*b)/255;
                return lum > 0.6 ? '#000' : '#fff';
            }
        }
    }
</script>
