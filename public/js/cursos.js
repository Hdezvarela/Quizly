document.addEventListener('DOMContentLoaded', gets(), false);

function gets(){
	let data = new FormData();
	data.append('method', 'GET');
	fetch('/api/courses', {
		method: 'post',
		body: data
	})
	.then(response => {
		if(!response.ok)
			throw Error(response.status);
		return response.json();
	})
	.then(result => {
		let print = document.querySelector('.print');
        print.innerHTML = '';
        let productsHTML = result.map(clas => `
			<article class="class">
				<a href="/clases/${clas.id}"><img src="/public/img/icons/StreamlineClassLessonSolid.svg" alt=""></a>
				<a href="/clases/${clas.id}"><h4 class="name">${clas.name}</h4></a>
				<a href="/clases/editar/${clas.id}/"><img src="/public/img/icons/IconParkTwotoneConfig.svg" alt=""></a>
				<a href="/clases/${clas.id}"><img src="/public/img/icons/ClarityEyeSolid.svg" alt=""></a>
			</article>`).join('');
        print.innerHTML = productsHTML;
    })
	.catch(error => {
		console.error("ERROR: ", error.message);
		if(error.message == '404'){
			let print = document.querySelector('.print');
			print.innerHTML = '<p class="noResult">Aún no cuentas con clases.</p>';
		}
	});
}