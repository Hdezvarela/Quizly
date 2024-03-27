document.getElementById('recovery').addEventListener('submit', function(event){
    event.preventDefault();
	const data = new FormData(document.getElementById('recovery'));
    data.append('request', 'recovery');
	let valsubmit = document.getElementById('send');
    valsubmit.value = 'Solicitando Datos...';
	fetch('/sessions', {
		method: 'post',
		body: data
	})
	.then(response => {
		if(!response.ok){
			throw Error(response.status);
		}
		Toast.fire({
			icon: 'success',
			title: 'Enviamos un enlace a tu correo'
		});
		document.getElementById('recovery').reset();
	})
	.catch(error => {
		console.error('ERROR: ', error.message);
		Toast.fire({
			icon: 'error',
			title: error.message
		});
	})
	.finally(() => {
		valsubmit.value = 'Recuperar cuenta';
	});
});