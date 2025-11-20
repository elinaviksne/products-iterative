document.addEventListener('DOMContentLoaded', () => {
    const tagInput = document.getElementById('tag-input');
    const tagsContainer = document.getElementById('tags-container');
    const tagsHidden = document.getElementById('tags-hidden');

    // Izveido autocomplete dropdown
    const autocompleteList = document.createElement('div');
    autocompleteList.id = 'autocomplete-list';
    autocompleteList.classList.add('autocomplete-items');
    tagInput.parentNode.appendChild(autocompleteList);

    // Inicializē hidden input ar esošajām birkām
    function updateHiddenTags() {
        const tags = [...tagsContainer.querySelectorAll('.tag')].map(span => span.dataset.name);
        tagsHidden.value = tags.join(',');
    }
    updateHiddenTags();

    // Dzēšanas poga
    tagsContainer.addEventListener('click', e => {
        if (e.target.classList.contains('delete-tag')) {
            e.target.parentElement.remove();
            updateHiddenTags();
        }
    });

    // Pievienošana sarakstā
    function addTag(name) {
        name = name.trim();
        if (!name) return;
        if ([...tagsContainer.querySelectorAll('.tag')].some(t => t.dataset.name === name)) return;

        const span = document.createElement('span');
        span.classList.add('tag');
        span.dataset.name = name;
        span.innerHTML = `${name} <button class="delete-tag">×</button>`;
        tagsContainer.appendChild(span);

        updateHiddenTags();
    }

    // Autocomplete AJAX
    let timeout;
    tagInput.addEventListener('input', () => {
        clearTimeout(timeout);
        const query = tagInput.value.trim();
        if (!query) {
            autocompleteList.innerHTML = '';
            return;
        }

        timeout = setTimeout(() => {
            fetch(`/tags/search?q=${encodeURIComponent(query)}`)
                .then(res => res.json())
                .then(data => {
                    autocompleteList.innerHTML = '';
                    data.forEach(tag => {
                        const item = document.createElement('div');
                        item.textContent = tag;
                        item.classList.add('autocomplete-item');
                        item.addEventListener('click', () => {
                            addTag(tag);
                            tagInput.value = '';
                            autocompleteList.innerHTML = '';
                        });
                        autocompleteList.appendChild(item);
                    });
                });
        }, 300);
    });

    // Enter taustiņš birkas pievienošanai
    tagInput.addEventListener('keydown', e => {
        if (e.key === 'Enter') {
            e.preventDefault();
            addTag(tagInput.value);
            tagInput.value = '';
            autocompleteList.innerHTML = '';
        }
    });

    // Klikšķis ārpus input vai dropdown
    document.addEventListener('click', e => {
        if (e.target !== tagInput && e.target.parentNode !== autocompleteList) {
            autocompleteList.innerHTML = '';
        }
    });
});
