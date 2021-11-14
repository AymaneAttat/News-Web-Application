
<!--Modal-->
<div class="modal opacity-0 pointer-events-none fixed w-full h-full top-0 left-0 flex items-center justify-center">
    <div class="modal-overlay absolute w-full h-full bg-gray-500 opacity-75"></div>
    
    <div class="modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">
      
      <div class="modal-close absolute top-0 right-0 cursor-pointer flex flex-col items-center mt-4 mr-4 text-white text-sm z-50">
        <svg class="fill-current text-white" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
          <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
        </svg>
        <span class="text-sm">(Esc)</span>
      </div>

      <!-- Add margin if you want to see some of the overlay behind the modal-->
      <div class="modal-content py-4 text-left px-6">
        <!--Title-->
        <div class="flex justify-between items-center pb-3">
          <p class="text-2xl font-bold">paramètres</p>
          <div class="modal-close cursor-pointer z-50">
            <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
              <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
            </svg>
          </div>
        </div>

        <!--Body-->
        <div class="text-center">
            <div class="inline-flex text-center" role="group" aria-label="Button group">
                <form method="post" action="{{ route('posts.destroy', ['post' => $post]) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="h-10 px-5 m-2 text-red-100 transition-colors duration-150 bg-red-700 rounded-lg focus:shadow-outline hover:bg-red-800">
                        <svg class="inline-block" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" style="vertical-align: -0.125em;" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 28 28"><g fill="none"><path d="M14 2.25a3.75 3.75 0 0 1 3.745 3.55l.005.2h5.5a.75.75 0 0 1 .102 1.493l-.102.007h-1.059l-1.22 15.053A3.75 3.75 0 0 1 17.233 26h-6.466a3.75 3.75 0 0 1-3.738-3.447L5.808 7.5H4.75a.75.75 0 0 1-.743-.648L4 6.75a.75.75 0 0 1 .648-.743L4.75 6h5.5A3.75 3.75 0 0 1 14 2.25zm6.687 5.25H7.313l1.211 14.932a2.25 2.25 0 0 0 2.243 2.068h6.466a2.25 2.25 0 0 0 2.243-2.068L20.686 7.5zm-8.937 3.75a.75.75 0 0 1 .743.648L12.5 12v8a.75.75 0 0 1-1.493.102L11 20v-8a.75.75 0 0 1 .75-.75zm4.5 0a.75.75 0 0 1 .743.648L17 12v8a.75.75 0 0 1-1.493.102L15.5 20v-8a.75.75 0 0 1 .75-.75zM14 3.75a2.25 2.25 0 0 0-2.245 2.096L11.75 6h4.5l-.005-.154A2.25 2.25 0 0 0 14 3.75z" fill="currentColor"/></g></svg>
                        <span>{{ __('Supprimer') }}</span>
                    </button>
                </form>
                
                <a href="{{ route('posts.edit',['post' => $post]) }}">
                    <button  class="h-10 px-5 m-2 text-blue-100 transition-colors duration-150 bg-blue-600 rounded-lg focus:shadow-outline hover:bg-blue-700">
                        <svg viewBox="0 0 20 20" enable-background="new 0 0 20 20" class="w-4 h-4 inline-block mr-1">
                            <path fill="#FFFFFF" d="M17.561,2.439c-1.442-1.443-2.525-1.227-2.525-1.227L8.984,7.264L2.21,14.037L1.2,18.799l4.763-1.01 l6.774-6.771l6.052-6.052C18.788,4.966,19.005,3.883,17.561,2.439z M5.68,17.217l-1.624,0.35c-0.156-0.293-0.345-0.586-0.69-0.932 c-0.346-0.346-0.639-0.533-0.932-0.691l0.35-1.623l0.47-0.469c0,0,0.883,0.018,1.881,1.016c0.997,0.996,1.016,1.881,1.016,1.881 L5.68,17.217z"/>
                        </svg>
                        <span>Modifier</span>
                    </button>
                </a>
            </div>
        </div>

        <!--Footer
        <div class="flex justify-end pt-2">
            <button class="modal-close h-10 px-5 text-indigo-100 transition-colors duration-150 bg-indigo-700 rounded-full focus:shadow-outline hover:bg-indigo-800">
                <svg class="inline-block fill-current text-white" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                    <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
                </svg>
                <span>Fermer</span>
            </button>
        </div>-->
        
      </div>
    </div>
</div>

<script>
    var openmodal = document.querySelectorAll('.modal-open')
    for (var i = 0; i < openmodal.length; i++) {
      openmodal[i].addEventListener('click', function(event){
    	event.preventDefault()
    	toggleModal()
      })
    }
    
    const overlay = document.querySelector('.modal-overlay')
    overlay.addEventListener('click', toggleModal)
    
    var closemodal = document.querySelectorAll('.modal-close')
    for (var i = 0; i < closemodal.length; i++) {
      closemodal[i].addEventListener('click', toggleModal)
    }
    
    document.onkeydown = function(evt) {
      evt = evt || window.event
      var isEscape = false
      if ("key" in evt) {
    	isEscape = (evt.key === "Escape" || evt.key === "Esc")
      } else {
    	isEscape = (evt.keyCode === 27)
      }
      if (isEscape && document.body.classList.contains('modal-active')) {
    	toggleModal()
      }
    };
    
    
    function toggleModal () {
      const body = document.querySelector('body')
      const modal = document.querySelector('.modal')
      modal.classList.toggle('opacity-0')
      modal.classList.toggle('pointer-events-none')
      body.classList.toggle('modal-active')
    }

  </script>