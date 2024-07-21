window.onload = () => {
    ajaxifyPaginateLinks();
    const header = document.querySelector('#site-header');
    const logo = document.querySelector('#site-header > ul li:first-child a');
    const secondItem = document.querySelector('#site-header > ul li:nth-child(2)');
    const thirdItem = document.querySelector('#site-header > ul li:nth-child(3)');
    if (secondItem && thirdItem) {
        secondItem.addEventListener('click', function() {
            secondItem.style.display = 'none';
            thirdItem.style.display = 'block';
            const mainMenu = document.querySelector('.main-menu');
            if (mainMenu) {
                if (mainMenu.style.display === 'none' || mainMenu.style.display === '') {
                    mainMenu.style.display = 'flex';
                    header.style.backgroundColor = '#050A3A';
                    logo.classList.add('logo-white');
                } else {
                    mainMenu.style.display = 'none';
                    header.style.backgroundColor = '#ffff';
                    logo.classList.remove('logo-white');
                }
            }
        });
		thirdItem.addEventListener('click', function() {
			secondItem.style.display = 'block';
			thirdItem.style.display = 'none';
				const mainMenu = document.querySelector('.main-menu');
			if (mainMenu && mainMenu.style.display !== 'none') {
				mainMenu.style.display = 'none';
				header.style.backgroundColor = '#ffff'; 
				logo.classList.remove('logo-white');
			}
		});
    }
};

function ajaxifyPaginateLinks() {
	document.querySelectorAll(".page-numbers").forEach((elem) => {
		elem.onclick = (e) => {
			e.preventDefault(); // annule le comportement par défaut

			const current = Number(
				document.querySelector(".page-numbers.current").innerHTML
			);
			var target;
			if (elem.classList.contains("next")) {
				target = current + 1;
			} else if (elem.classList.contains("prev")) {
				target = current - 1;
			} else {
				target = Number(elem.innerHTML);
			}
			fetchPage(target);
		};
	});
}

function fetchPage(page) {
	// fetch vers l'url admin-ajax...// avec des param GET action, page et base (de l'URL)

	fetch(
		esgi.ajaxURL +
			"?action=load_posts&page=" +
			page +
			"&base=" +
			esgi.basePagination
	).then((response) => {
		response.text().then((text) => {
			document.getElementById("list-wrapper").innerHTML = text;
			ajaxifyPaginateLinks();
		});
	});
}
