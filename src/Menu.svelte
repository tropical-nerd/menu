<script>
    import MenuRow from './MenuRow.svelte';

	export let menu;
</script>

<style>

</style>

<section class="menu">
    <h2 class="menu__heading">{menu.title}</h2>
    {#if menu.info}
        <p class="menu__info">{@html menu.info}</p>
    {/if}

    <ul class="menu__list">
        {#each menu.contents as menuRow}
            <MenuRow {menuRow}/>
        {/each}
    </ul>
</section>