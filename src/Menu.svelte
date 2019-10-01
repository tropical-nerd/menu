<script>
    import MenuRow from './MenuRow.svelte';

    export let menu;
    export let editMode;
</script>

<style>

</style>

<section class="menu" >
    <h2 class="menu__heading" class:edit-hover={editMode}>{menu.title}</h2>
    {#if menu.info}
        <p class="menu__info">{@html menu.info}</p>
    {/if}

    <ul class="menu__list" class:edit-hover={editMode}>
        {#each menu.contents as menuRow}
            <MenuRow {menuRow}/>
        {/each}
    </ul>
</section>