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
          <a href="/users-list" class="ml-1 text-sm font-medium text-gray-700 hover:text-gray-900 md:ml-2 dark:text-gray-400 dark:hover:text-white">
            <a href="/users-list" class="text-blue-600 hover:text-blue-700">@yield('titulo')</a></a>
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
                <a class="bg-primary-700 hover:bg-primary-800 focus:ring-4
                focus:ring-primary-300 font-medium rounded-lg
                 text-sm px-4 lg:px-5 py-2 lg:py-2.5 mr-2
                  dark:bg-primary-600 dark:hover:bg-primary-700 
                  focus:outline-none dark:focus:ring-primary-800 text-white" href="/users-list">< Back</a>
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
                
                    <div class="capitalize w-full px-6 py-4 bg-white rounded shadow-md ring-1 ring-gray-900/10"> 
 @foreach ($users as $users)
                        <form action="{{ route('auth.update',$users->id) }}" method="POST"
                            enctype="multipart/form-data" autocomplete="off">
                            @csrf
                           
                            <div>
                                <input type="hidden" value="{{$users->id}}" name="id">
                            <label class="block text-md font-bold text-gray-700" 
                            for="Name">avatar <img  class="w-14 h-14 rounded-full bg-white"
                            src="{{ $users->image ? asset('thumbnail'). '/'. $users->image :
                            asset('img/admin.png') }}" width="100px"></label><br>
                                <input type="file" name="image" class="form-control" placeholder="image"
                                accept="image/png, image/gif, image/jpeg">
                                        @if ($errors->has('image'))
                                        <span class="bg-red-500 text-white my-2 rounded-lg text-sm
                                        p-2 text-center">{{ $errors->first('image') }}</span>
                                    @endif
                            </div>

                            <div>
                                <label class="block text-md font-bold text-gray-700" for="Name">username</label>
                                    <input type="text" placeholder=""
                                    class="w-full px-4 py-2 mt-2 border rounded-md 
                                    focus:outline-none focus:ring-1 focus:ring-blue-600" 
                                    id="name" name="username" value="{{ $users->username }}" required  
                                    >
                                    @if ($errors->has('username'))
                                    <span class="bg-red-500 text-white my-2 rounded-lg text-sm
                                    p-2 text-center">{{ $errors->first('username') }}</span>
                                @endif
                               
                            </div>
                            <div>
                                <label class="block text-md font-bold text-gray-700" for="Name">First Name</label>
                                    <input type="text" placeholder=""
                                    class="w-full px-4 py-2 mt-2 border rounded-md 
                                    focus:outline-none focus:ring-1 focus:ring-blue-600" 
                                    id="name" name="name" value="{{ $users->name }}"  required  
                                    >
                                    @if ($errors->has('name'))
                                    <span class="bg-red-500 text-white my-2 rounded-lg text-sm
                                    p-2 text-center">{{ $errors->first('name') }}</span>
                                @endif
                               
                            </div>

                            <div>
                                <label class="block text-md font-bold text-gray-700" for="Name">last Name</label>
                                    <input type="text" placeholder=""
                                    class="w-full px-4 py-2 mt-2 border rounded-md 
                                    focus:outline-none focus:ring-1 focus:ring-blue-600" 
                                    id="name" name="lastname" value="{{ $users->lastname }}"  required  
                                    >
                                    @if ($errors->has('lastname'))
                                    <span class="bg-red-500 text-white my-2 rounded-lg text-sm
                                    p-2 text-center">{{ $errors->first('lastname') }}</span>
                                @endif
                               
                            </div>

                            <div>
                                <label class="block text-md font-bold text-gray-700" for="title">Email:</label>
                                <input type="email" placeholder="Email"
                                    class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600"
                                    id="email_address"  name="email" value="{{ $users->email }}" autocomplete="off" required >
                            </div>

                           @endforeach
                            <div class="flex items-center justify-start mt-4 gap-x-2 my-10">
                                <button type="submit" class="bg-primary-700 hover:bg-primary-800 focus:ring-4
                                focus:ring-primary-300 font-medium rounded-lg
                                 text-sm px-4 lg:px-5 py-5 my-4 lg:py-2.5 mr-2
                                  dark:bg-primary-600 dark:hover:bg-primary-700 
                                  focus:outline-none dark:focus:ring-primary-800 text-white
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