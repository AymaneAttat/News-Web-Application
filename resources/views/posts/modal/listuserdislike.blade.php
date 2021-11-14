<div id="modal"
    class="fixed top-0 left-0 w-screen h-screen flex items-center justify-center bg-gray-500 bg-opacity-50 transform scale-0 transition-transform duration-300">
    <!-- Modal content -->
    <div class="bg-white rounded w-2/4 h-2/4 p-12"> 
        <!--Close modal button-->
        <button id="closebutton" type="button" class="focus:outline-none">
            <!-- Hero icon - close button -->
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
        </button>
        <!-- Test content src="https://pickaface.net/gallery/avatar/unr_random_180410_1905_z1exb.png"-->
        <h1 class="text-center text-3xl">Déteste Liste</h1>
        @forelse ($dislikes as $like)
                    <div class="flex mb-4">
                        <img src="{{$like->user->image ? $like->user->image->url() : 'http://lilithaengineering.co.za/wp-content/uploads/2017/08/person-placeholder.jpg'}}" alt="lovely avatar" class="w-12 h-12 rounded-full" />
                        <div class="flex">
                            <div class="ml-2 mt-0.5">
                                <span class="block font-medium text-base leading-snug text-black dark:text-gray-100">{{$like->user->name}}</span>
                                <span class="block text-sm text-gray-500 dark:text-gray-400 font-light leading-snug">{{ $like->created_at->diffForHumans() }}</span>
                            </div>
                        </div>
                    </div>
                    <hr>
                @empty
                    <p>{{__('Aucune déteste')}}</p>
                @endforelse
    </div>
</div>


<script> 
    const button = document.getElementById('buttonmodal')
    const closebutton = document.getElementById('closebutton')
    const modal = document.getElementById('modal')

    button.addEventListener('click',()=>modal.classList.add('scale-100'))
    closebutton.addEventListener('click',()=>modal.classList.remove('scale-100'))
</script>