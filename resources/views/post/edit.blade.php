@extends('dashboard')

    
@section('titulo')
Edit Email
@endsection

@section('container')

   
<nav class="flex my-3" aria-label="Breadcrumb">
    <ol class="inline-flex items-center space-x-1 md:space-x-3 mx-auto">
      <li class="inline-flex items-center">
        <a href="/dashboard" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">
          <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
          <a href="/dashboard">Home</a> 
        </a>
      </li>
      <li>
        <div class="flex items-center">
          <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
          <a href="/posts" class="ml-1 text-sm font-medium text-gray-700 hover:text-gray-900 md:ml-2 dark:text-gray-400 dark:hover:text-white">
            <a href="/posts" class="text-blue-600 hover:text-blue-700">@yield('titulo')</a></a>
        </div>
      </li>
     
    </ol>
  </nav>
  <h1 class="mb-4 my-5 py-5 text-3xl text-center font-extrabold
  text-gray-900 dark:text-white md:text-4xl lg:text-4xl"><span 
     class="text-transparent bg-clip-text bg-gradient-to-r to-emerald-600 from-sky-400">
     @yield('titulo')</span> </h1>

    <!-- EDIT EMAILS CRUD--> 
    <div class="max-w-4xl mx-auto mt-8">

        <div class="mb-4">
            
            <div class="flex justify-end mt-5">
                <a class="bg-blue-700 hover:bg-blue-800 focus:ring-4
                focus:ring-blue-300 font-medium rounded-lg
                 text-sm px-4 lg:px-5 py-2 lg:py-2.5 mr-2
                  dark:bg-blue-600 dark:hover:bg-blue-700 
                  focus:outline-none dark:focus:ring-blue-800 text-white" href="{{ route('posts.index') }}">< Back</a>
            </div>
        </div>
    
        <div class="flex flex-col mt-5">
            <div class="flex flex-col">
                <div class="inline-block min-w-full overflow-hidden align-middle border-b border-gray-200 shadow sm:rounded-lg">

                    @if ($errors->any())
                        <div class="p-5 rounded bg-red-500 text-white m-3" x-data="{ showMessage: true }" x-show="showMessage" x-init="setTimeout(() => showMessage = false, 6000)">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                
                    <div class="w-full px-6 py-4 bg-white rounded shadow-md ring-1 ring-gray-900/10"> 

                        <form action="{{ route('posts.update',$post->id) }}" method="POST" autocomplete="off">
                            @csrf
                            @method('PUT')

                            <div>
                                <label class="block text-sm font-bold text-gray-700" for="title">Title:</label>
                                <input type="text" name="title" value="{{ $post->title }}" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm placeholder:text-gray-400 placeholder:text-right focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="Title">
                            </div>

                            <div class="mt-4">
                                <label class="block text-sm font-bold text-gray-700" for="title">Body:</label>
                                <textarea class="block w-full mt-1 border-gray-300 rounded-md shadow-sm placeholder:text-gray-400 placeholder:text-right focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="body" placeholder="Body">{{ $post->body }}</textarea>
                            </div>

                            <div>
                               
                                <input type="hidden" placeholder=""
                                class="  w-full px-4 py-2 mt-2 border rounded-md 
                                focus:outline-none focus:ring-1 mb-5 focus:ring-blue-600" 
                                name="iduser" required maxlength="100"
                                 readonly value="{{ auth()->user()->id }}">
                            </div>

                            <div class="flex items-center justify-start mt-4 gap-x-2 my-10">
                                <button type="submit" class="bg-blue-700 hover:bg-blue-800 focus:ring-4
                                focus:ring-blue-300 font-medium rounded-lg
                                 text-sm px-4 lg:px-5 py-5 my-4 lg:py-2.5 mr-2
                                  dark:bg-blue-600 dark:hover:bg-blue-700 
                                  focus:outline-none dark:focus:ring-blue-800 text-white
                                  transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110">Submit</button>
                            </div>
                   
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
 <!--END  EDIT EMAILS CRUD--> 

    @endsection