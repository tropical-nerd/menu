<script>
	let promise = getMenu();
	let editMode = false;

	let menuHeading = "Appetizers";

	async function getMenu() {
		const res = await fetch(`data.json`);
		const text = await res.text();

		if (res.ok) {
			return text;
		} else {
			throw new Error(text);
		}
	}
</script>

<style>

	h1 {
		color: purple;
		text-align: center;
	}

	.edit-checkbox {
		text-align: right;
		max-width: 52rem;
		margin: 0 auto;
		padding: 0 3rem;
	}

	.edit-checkbox__text {
		padding-right: .5em;
	}

	.menu {
		max-width: 52rem;
		margin: 0 auto;
		padding: 0 3rem;
		display: table;
	}

	.menu__row {
		
		display: table-row;
	}

	.menu__row + .menu__row {
		border: 1px solid #666;
	}

	.menu__cell {
		display: table-cell;
		padding: 1rem 0;
	}

	.menu__cell--id {
		width: 3rem;
	}

	.menu__cell--name {
		width: 7rem; 
	}

	.menu__cell--desc {
		width: auto;
	}

	.menu__cell--price {
		width: 3rem;
		text-align: right;
	}

	
</style>
<h1>Thai Cafe</h1>

<label class="edit-checkbox"><span class="edit-checkbox__text">Edit</span><input type="checkbox" bind:checked={editMode} /></label>

{#if !editMode}
	<section class="menu">
		<h2 class="menu__heading">{menuHeading}</h2>

		{#await promise}
			<p>...loading</p>
		{:then menu}
			{#each JSON.parse(menu) as menuItem}
				<div class="menu__row">
					<span class="menu__cell menu__cell--id">{menuItem.id}. </span>
					<span class="menu__cell menu__cell--name">{menuItem.name}</span>
					<span class="menu__cell menu__cell--desc">{menuItem.desc}</span>
					<span class="menu__cell menu__cell--price">${menuItem.price}</span>
				</div>
			{/each}
		{:catch error}
			<p style="color: red">{error.message}</p>
		{/await}
	</section>

{:else}
	<section class="menu">
		<h2 class="menu__heading" contenteditable="true" bind:innerHTML={menuHeading}>{menuHeading}</h2>

		{#await promise}
			<p>...loading</p>
		{:then menu}
			{#each JSON.parse(menu) as menuItem}
				<div class="menu__row">
					<span class="menu__cell menu__cell--id">{menuItem.id}. </span>
					<span class="menu__cell menu__cell--name">{menuItem.name}</span>
					<span class="menu__cell menu__cell--desc">{menuItem.desc}</span>
					<span class="menu__cell menu__cell--price">${menuItem.price}</span>
				</div>
			{/each}
		{:catch error}
			<p style="color: red">{error.message}</p>
		{/await}
	</section>
{/if}