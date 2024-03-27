document.getElementById('login').addEventListener('submit', function(event){
    event.preventDefault();
	const data = new FormData(document.getElementById('login'));
	data.append('request', 'start');
	let valsubmit = document.getElementById('send');
	let loader = document.querySelector('.loader');
    valsubmit.value = '';
	loader.style.opacity = '1';
	fetch('/sessions', {
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
		loader.style.opacity = '0';
		valsubmit.value = 'Iniciar Sesión';
	});
});