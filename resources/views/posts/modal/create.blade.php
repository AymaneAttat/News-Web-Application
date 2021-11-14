<!-- Session Status -->
<x-auth-session-status class="mb-4" :status="session('status')" />

<!-- Validation Errors -->
<x-auth-validation-errors class="mb-4" :errors="$errors" />
<form method="POST" action="{{ route('posts.store') }}">
    @csrf    
    <div class="fixed z-10 inset-0 invisible overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true" id="interestModal">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
                <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">​</span>
                
                    <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                            <div class="sm:flex sm:items-start">
                                
                                <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                    <h3 class="text-lg text-center leading-6 font-medium text-gray-900" id="modal-title">
                                    Nouveau News
                                    </h3>
                                <div class="mt-2">
                                    <p class="text-sm text-gray-500">
                                        Remarque : tu ne peux pas publier une news déjà existé dans ce site .
                                    </p>
                                    <div class="mt-4">
                                        <x-label for="title" :value="__('Title')" />
                                        <x-input id="title" class="w-full block mt-1" type="text" name="title" :value="old('title')" required autofocus />
                                    </div>
                                    <div class="mt-4">
                                        <x-label for="url" :value="__('Url')" />
                                        <x-input id="url" class="w-full block mt-1" type="text" name="url" :value="old('url')" required autofocus />
                                    </div>
                                    <div class="mt-4">
                                        <x-label for="content" :value="__('content')" />
                                        <textarea class="w-full block mt-1" id="content" name="content" value="old('content')" rows="3"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                        <button type="submit" class="w-full inline-flex justify-center rounded-full border border-transparent shadow-sm px-4 py-2 bg-blue-600 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm">
                            {{ __('Créer') }}
                        </button>
                        <button type="button" class="closeModal mt-3 w-full inline-flex justify-center rounded-full border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                            {{ __('Fermer') }}
                        </button>
                    </div>
            </div>
        </div>
    </div>
</form>
<script type="text/javascript">
    $(document).ready(function () {
        $('.openModal').on('click', function(e){
            $('#interestModal').removeClass('invisible');
        });
        $('.closeModal').on('click', function(e){
            $('#interestModal').addClass('invisible');
        });
    });
</script>