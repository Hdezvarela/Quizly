const Toast = Swal.mixin({
	toast: true,
	position: 'top',
	iconColor: 'white',
	customClass: {
		popup: 'colored-toast',
	},
	showConfirmButton: false,
	timer: 2000,
	timerProgressBar: true,
	didOpen: (toast) => {
	  toast.addEventListener('mouseenter', Swal.stopTimer)
	  toast.addEventListener('mouseleave', Swal.resumeTimer)
	}
});

function logout(){
	let data = new FormData();
    data.append('request', 'exit');
	fetch('/sessions', {
		method: 'post',
		body: data
	})
	.then(response => {
		if(!response.ok){
			throw Error(response.status);
		}
		location.href = '/';
	})
	.catch(error => {
		console.error('ERROR: ', error.message);
	});
}

function back(){
	window.history.back();
}