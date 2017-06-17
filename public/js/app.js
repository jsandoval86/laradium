(function(){
	
	// add event 
	document.addEventListener('click', function (event) {
		var target = event.target

		if (target.className == 'like') {
			var postId = target.getAttribute('data-id')

			// request AJAX
			xhttp = new XMLHttpRequest()
			// open request
			xhttp.open('POST', '/post/'+ postId + '/likes')
			// send request
			xhttp.send()
			// response
			xhttp.onreadystatechange = function (){
				if (this.readyState == XMLHttpRequest.DONE) {
					// plus like
					onLike(this, target)
				}
			}

		}

	})

	function onLike(xhttp, target) {
		var response = JSON.parse(xhttp.responseText)
		var post = response.post
		target.innerHTML = 'Like ' + post.likes
	}

	var pusher = new Pusher('f127bb14a529d11fd35b', {
    cluster: 'us2',
    encrypted: true
  });

	var channel = pusher.subscribe('laradium')
	channel.bind('like', function (data) {
		console.log(data.message)
	})


})();