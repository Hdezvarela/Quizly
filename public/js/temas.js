let url = window.location.pathname;
document.addEventListener('DOMContentLoaded', gets(url.substring(8)), false);

function gets(id){
	let data = new FormData();
	data.append('method', 'GET');
	data.append('course', id);
	fetch('/api/topics', {
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
        let productsHTML = result.map(topic => `
			<article class="class">
				<a href="/clases/${id}/tema/${topic.id}"><img src="/public/img/icons/SvgSpinnersGooeyBalls2.svg" alt=""></a>
				<a href="/clases/${id}/tema/${topic.id}"><h4 class="name">${topic.name}</h4></a>
				<a href="/clases/editar/${topic.id}/"><img src="/public/img/icons/IconParkTwotoneConfig.svg" alt=""></a>
				<a href="/clases/${id}/tema/${topic.id}/"><img src="/public/img/icons/ClarityEyeSolid.svg" alt=""></a>
			</article>`).join('');
        print.innerHTML = productsHTML;
    })
	.catch(error => {
		console.error("ERROR: ", error.message);
		if(error.message == '404'){
			let print = document.querySelector('.print');
			print.innerHTML = '<p class="noResult">Este curso no tiene temas aún.</p>';
		}
	});
}

function addtopic(){
	Swal.fire({
		title: "Ingrese un nombre para este tema",
		input: "text",
		inputAttributes: {
		  autocapitalize: "off"
		},
		showCancelButton: true,
		confirmButtonText: "Crear",
		showLoaderOnConfirm: true,
		preConfirm: async (name) => {
			let url = window.location.pathname;
			let data = new FormData();
			course = url.substring(8);
			console.log(url.substring(8));
			data.append('course', course);
			data.append('method', 'POST');
			data.append('name', name);
			fetch('/api/topics', {
				method: 'post',
				body: data
			})
			.then(response => {
				if(!response.ok){
					throw Error(response.status);
				}
				location.reload();
			})
			.catch(error => {
				console.error("ERROR: ", error.message);
			});
		},
		allowOutsideClick: () => !Swal.isLoading()
	  }).then((result) => {
		console.log(result);
	  });
}