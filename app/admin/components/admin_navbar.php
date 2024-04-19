<?php
function navbar($currentPage)
{
	$navLinks = [
		[
			'label' => 'Dashboard', 'url' => './dashboard.php', 'icon' =>
			'<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
				<path stroke-linecap="round" stroke-linejoin="round" d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
			</svg>'
		],
		[
			'label' => 'Payments', 'url' => './payments.php', 'icon' =>
			'<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
				<path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18.75a60.07 60.07 0 0 1 15.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 0 1 3 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 0 0-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 0 1-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 0 0 3 15h-.75M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm3 0h.008v.008H18V10.5Zm-12 0h.008v.008H6V10.5Z" />
			</svg>'
		],
		[
			'label' => 'Account Settings', 'url' => './settings.php', 'icon' =>
			'<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
				<path stroke-linecap="round" stroke-linejoin="round" d="M10.343 3.94c.09-.542.56-.94 1.11-.94h1.093c.55 0 1.02.398 1.11.94l.149.894c.07.424.384.764.78.93.398.164.855.142 1.205-.108l.737-.527a1.125 1.125 0 0 1 1.45.12l.773.774c.39.389.44 1.002.12 1.45l-.527.737c-.25.35-.272.806-.107 1.204.165.397.505.71.93.78l.893.15c.543.09.94.559.94 1.109v1.094c0 .55-.397 1.02-.94 1.11l-.894.149c-.424.07-.764.383-.929.78-.165.398-.143.854.107 1.204l.527.738c.32.447.269 1.06-.12 1.45l-.774.773a1.125 1.125 0 0 1-1.449.12l-.738-.527c-.35-.25-.806-.272-1.203-.107-.398.165-.71.505-.781.929l-.149.894c-.09.542-.56.94-1.11.94h-1.094c-.55 0-1.019-.398-1.11-.94l-.148-.894c-.071-.424-.384-.764-.781-.93-.398-.164-.854-.142-1.204.108l-.738.527c-.447.32-1.06.269-1.45-.12l-.773-.774a1.125 1.125 0 0 1-.12-1.45l.527-.737c.25-.35.272-.806.108-1.204-.165-.397-.506-.71-.93-.78l-.894-.15c-.542-.09-.94-.56-.94-1.109v-1.094c0-.55.398-1.02.94-1.11l.894-.149c.424-.07.765-.383.93-.78.165-.398.143-.854-.108-1.204l-.526-.738a1.125 1.125 0 0 1 .12-1.45l.773-.773a1.125 1.125 0 0 1 1.45-.12l.737.527c.35.25.807.272 1.204.107.397-.165.71-.505.78-.929l.15-.894Z" />
				<path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
			</svg>'
		],
	];

	echo '<dialog id="logout_modal" class="modal backdrop-blur">';
	echo '<div class="modal-box">';
	echo '<h3 style="font-family: \'San Francisco Rounded Bold\';" class="font-bold text-2xl">Logout</h3>';
	echo '<p style="font-family: \'San Francisco Rounded Regular\';" class="py-4">Are you sure you want to logout?</p>';
	echo '<div class="modal-action">';
	echo '<button class="menuButton btn btn-yes btn-error text-white font-bold" onclick="logout()">YES</button>';
	echo '<button class="menuButton btn btn-cancel" onclick="closeLogoutModal()">CANCEL</button>';
	echo '</div>';
	echo '</div>';
	echo '</dialog>';
	echo '<div class="border border-slate-900/10 z-50 navbar backdrop-blur justify-between">';
	echo '<div class="navbar-start w-auto lg:hidden">';
	echo '<div class="dropdown">';
	echo '<div tabindex="0" role="button" class="btn btn-ghost btn-circle">';
	echo '<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" /></svg>';
	echo '</div>';
	echo '<ul tabindex="0" class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow bg-base-100 rounded-box w-52">';
	foreach ($navLinks as $item) {
		$isActive = ($item['url'] == $currentPage) ? 'text-black' : 'text-gray-400';
		echo '<li>';
		echo '<a href="' . $item['url'] . '" class="flex flex-row items-center nav-link ' . $isActive . '">';
		echo $item['icon'];
		echo $item['label'];
		echo '</a>';
		echo '</li>';
	}
	echo '<li>';
	echo '<button class="flex nav-link flex-row items-center text-red-400" onclick="openLogoutModal()">';
	echo '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
					<path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" />
				</svg>';
	echo 'Logout';
	echo '</button>';
	echo '</li>';
	echo '</ul>';
	echo '</div>';
	echo '</div>';
	echo '<div class="navbar-center">';
	echo '<a class="btn btn-ghost text-xl">EPAY</a>';
	echo '</div>';
	echo '<div class="dropdown dropdown-end">';
	echo '<div tabindex="0" role="button" class="btn btn-ghost btn-circle avatar">';
	echo '<div class="avatar placeholder">';
	echo '<div class="bg-neutral text-neutral-content rounded-full w-10">';
	echo '<span class="text-xl"></span>';
	echo '</div>';
	echo '</div>';
	echo '</div>';
	echo '<ul tabindex="0" class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow bg-base-100 rounded-box w-52">';
	echo '<li>';
	echo '<a href="./settings.php" class="link link-warning no-underline">';
	// SVG icon for Admin Account Settings
	echo 'Admin Account Settings';
	echo '</a>';
	echo '</li>';
	echo '<li>';
	echo '<a href="./../utils/logout.php" class="link-error link no-underline">';
	// SVG icon for Log Out
	echo 'Log Out';
	echo '</a>';
	echo '</li>';
	echo '</ul>';
	echo '</div>';
	echo '</div>';
}
