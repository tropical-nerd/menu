<script>
	import Menu from './Menu.svelte';

	const dataFile = 'data/data.json';

	let promise = getData();
	let menuData;
	let editMode = false;

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
</style>

<header class="masthead">
	<div class="masthead__wrap">
		<img class="masthead__logo" src="images/chill-out-logo.svg" alt="Chill Out Cafe Logo" />
		<div class="masthead__subheading">Dine-In &#8226; Carry-Out &#8226; Delivery</div>
		<a class="masthead__phone" href="&#116;&#101;&#108;:(&#053;&#048;&#052;)&#032;&#056;&#055;&#050;&#045;&#057;&#054;&#050;&#056;">(&#053;&#048;&#052;)&#032;&#056;&#055;&#050;&#045;&#057;&#054;&#050;&#056;</a>
		<div class="masthead__address">729 Burdette St., New Orleans, LA 70118
		</div>
	</div>
</header>

<main>
	<h1 class="page-title visibly-hidden">Menu</h1>
	
	<!-- <label class="edit-checkbox"><span class="edit-checkbox__text">Edit</span><input type="checkbox" bind:checked={editMode} /></label> -->

	{#await promise}
		<p>...loading</p>
	{:then menus}
		{#each menus as menu}
			<Menu {menu} {editMode}/>
		{:else}
			<p class="error">No menus found!</p>
		{/each}
	{:catch error}
		<p style="color: red">{error.message}</p>
	{/await}
</main>