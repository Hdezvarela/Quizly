function autoResize() {
	var textarea = document.getElementById('textarea');
	textarea.style.height = 'auto';
	textarea.style.height = (textarea.scrollHeight) + 'px';
}

document.addEventListener('DOMContentLoaded', function(){
	autoResize();
});

document.getElementById('newClass').addEventListener('submit', function(event){
	event.preventDefault();
	let data = new FormData(document.getElementById('newClass'));
	data.append('method', 'POST');
	let valsubmit = document.getElementById('send');
	let loader = document.querySelector('.loader');
	valsubmit.value = '';
	loader.style.opacity = '1';
	fetch('/api/courses', {
		method: 'post',
		body: data
	})
	.then(response => {
		if(!response.ok){
			throw Error(response.status);
		}
		location.href = '/clases';
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
		valsubmit.value = 'Crear Clase';
	})
});