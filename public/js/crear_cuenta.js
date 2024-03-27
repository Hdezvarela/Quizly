document.getElementById('login').addEventListener('submit', function(event){
    event.preventDefault();
	const data = new FormData(document.getElementById('login'));
	data.append('method', 'POST');
	let valsubmit = document.getElementById('send');
    valsubmit.value = 'Creando Cuenta...';
	fetch('/api/users', {
		method: 'post',
		body: data
	})
	.then(response => {
		if(!response.ok){
			throw Error(response.status);
		}
		location.href = '/cuenta';
	})
	.catch(error => {
		console.error('ERROR: ', error.message);
		Toast.fire({
			icon: 'error',
			title: error.message
		});
	})
	.finally(() => {
		valsubmit.value = 'Registrarme';
	});
});