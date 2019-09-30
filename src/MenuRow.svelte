<script>
    export let menuRow;
</script>

<style>
</style>

<li class="menu__row">
    <span class="menu__id">{@html menuRow.id}. </span>
    <span class="menu__title">{@html menuRow.title}</span>
    
    {#if menuRow.price}
        <span class="menu__price">${@html menuRow.price.toFixed(2)}<br /></span>
    {/if}
    {#if menuRow.desc}
        <span class="menu__desc">{@html menuRow.desc}</span>
    {/if}
    {#if menuRow.options}
        <ul class="menu__options">
            {#each menuRow.options as option}
                <li class="menu__option">
                    <span class="menu__option-title">{option.title}</span>
                    <span class="menu__option-price">${option.price.toFixed(2)}</span>
                </li>
            {/each}
        </ul>
    {/if}
</li>