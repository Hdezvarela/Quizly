function gets(course, topic){
	let data = new FormData();
	data.append('method', 'GET');
	data.append('course', course)
	data.append('topic', topic);
	fetch('/api/questions', {
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
		result.forEach(question => {
			const questionElement = document.createElement('article');
			questionElement.classList.add('question');
			let answersHTML = '';
			if(question.answers && question.answers.length > 0){
				answersHTML = `
					<div class="printAnswers">
						${question.answers.map(answer => `
							<div class="answer">
								<p class="${answer.correct ? 'correct' : 'bad'}">${answer.text}</p>
							</div>
						`).join('')}
					</div>
				`;
			}else{
				answersHTML = '<p class="no-answers">No hay respuestas para esta pregunta.</p>';
			}
			questionElement.innerHTML = `
				<div class="head">
					<h3>Pregunta ${question.id}</h3>
					<p class="opt" id="removeQuest" onclick="dlt(${question.id})">Eliminar</p>
					<a href="/clases/1/tema/1/editar/${question.id}" class="opt" id="editQuest">Editar</a>
				</div>
				<p class="quest">${question.text}</p>
				${answersHTML}
			`;
	
			print.appendChild(questionElement);
		});
	})
	.catch(error => {
		console.error("ERROR: ", error.message);
		if(error.message == '404'){
			let print = document.querySelector('.print');
			print.innerHTML = '<p class="noResult">Este tema no tiene preguntas aún.</p>';
		}
	});
}

function dlt(id){
	Swal.fire({
		title: 'Eliminar Pregunta',
		text: '¿Esta seguro de eliminar esta pregunta?',
		showCancelButton: true,
		cancelButtonText: 'Cancelar',
		confirmButtonColor: '#d33',
		cancelButtonColor: '#3085d6',
		confirmButtonText: 'Eliminar'
	})
	.then((result) => {
		if(result.isConfirmed){
            let data = new FormData();
			data.append('method', 'DELETE');
			data.append('id', id)
			fetch('/api/questions', {
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
				console.error('ERROR: ', error.message);
			});
		}else if(result.isDismissed){
			Swal.close();
		}
	});
}