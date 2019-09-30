<script>
	import Menu from './Menu.svelte';

	const dataFile = 'data/data.json';

	let promise = getData();
	let menuData;
	// let editMode = false;

    async function getData() {
		const res = await fetch(`data/data.json`);
		const text = await res.text();

		if (res.ok) {
			menuData = JSON.parse(text);
			return menuData;
		} else {
			throw new Error(text);
		}
	}

	// function post(data) {
	// 	var xmlhttp = new XMLHttpRequest();

	// 	xmlhttp.onreadystatechange = function() {
	// 			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
	// 					alert(xmlhttp.responseText);
	// 			}
	// 	}

	// 	xmlhttp.open("POST", "ajax.php", true);
	// 	xmlhttp.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
	// 	xmlhttp.send(JSON.stringify(data));
	// }
</script>

<style>

	
	.edit-checkbox {
		text-align: right;
		max-width: 52rem;
		margin: 0 auto;
		padding: 0 3rem;
	}

	.edit-checkbox__text {
		padding-right: .5em;
	}




	
</style>

<main>
	<h1 class="site-title">Thai Cafe</h1>

	<!-- <label class="edit-checkbox"><span class="edit-checkbox__text">Edit</span><input type="checkbox" bind:checked={editMode} /></label> -->

	{#await promise}
		<p>...loading</p>
	{:then menus}
		{#each menus as menu}
			<Menu {menu}/>
		{:else}
			<p class="error">No menus found!</p>
		{/each}
	{:catch error}
		<p style="color: red">{error.message}</p>
	{/await}
</main>