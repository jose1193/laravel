
@extends('layouts.app')

    @section('titulo')
   Contact Us
    @endsection
    
    
    @section('container')
    
<nav class="flex my-3" aria-label="Breadcrumb">
    <ol class="inline-flex items-center space-x-1 md:space-x-3 mx-auto">
      <li class="inline-flex items-center">
        <a href="#" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">
          <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
          <a href="/">Home</a> 
        </a>
      </li>
      <li>
        <div class="flex items-center">
          <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
          <a href="/contact" class="ml-1 text-sm font-medium text-gray-700 hover:text-gray-900 md:ml-2 dark:text-gray-400 dark:hover:text-white">
            <a href="/contact" class="text-blue-600 hover:text-blue-700">@yield('titulo')</a></a>
        </div>
      </li>
     
    </ol>
  </nav>
 
  <h1 class="mb-4 my-5 py-5 text-3xl text-center font-extrabold text-gray-900 dark:text-white md:text-4xl lg:text-5xl"><span 
    class="text-transparent bg-clip-text bg-gradient-to-r to-emerald-600 from-sky-400">
    @yield('titulo')</span> </h1>


    <!-- Container for demo purpose -->
<div class="container my-24 px-6 mx-auto">

    <!-- Section: Design Block -->
    <section class="mb-32">
      <style>
        @media (min-width: 992px) {
          #cta-img-nml-50 {
            margin-left: 50px;
          }
        }
      </style>
  
      <div class="flex flex-wrap">
        <div class="grow-0 shrink-0 basis-auto w-full lg:w-5/12 mb-12 lg:mb-0">
          <div class="flex lg:py-12">
            <img src="https://images.unsplash.com/photo-1551434678-e076c223a692?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=2850&q=80" class=" hidden md:block  w-full rounded-lg shadow-lg"
              id="cta-img-nml-50" style="z-index: 10" alt="" />
          </div>
        </div>
  
        <div class="grow-0 shrink-0 basis-auto w-full lg:w-7/12">
          <div
            class=" bg-gradient-to-r to-emerald-600 from-sky-400 h-full rounded-lg p-6 lg:pl-12 text-white flex items-center text-center lg:text-left">
            <div class="lg:pl-12">
             
                <div class="py-8 lg:py-16 px-4 mx-auto max-w-screen-md">
                    <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-center text-primary-900 dark:text-white">
                      Contact Form</h2>
                    <p class="mb-8 lg:mb-16 font-bold text-center text-white dark:text-gray-400 sm:text-xl">
                      Got a technical issue? Want to send feedback about a beta feature? Need details about
                       our Web App? Let us know.</p>

                     

                    <form  action="{{ route('contact-form.store') }}" method="POST" class="space-y-5" autocomplete="off">
                      {{ csrf_field() }}
                      <div>
                        <label for="name" class="block mb-2 text-sm font-bold text-white">Your Name</label>
                        <input type="text" id="name" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900
                         text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 
                         block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600
                          dark:placeholder-gray-400 dark:text-white
                           dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light"
                         placeholder="Write your name" name="name" value="{{ old('name') }}" required>
                         @if ($errors->has('name'))
                         <span class="bg-red-500 text-white my-2 rounded-lg text-sm
                                    p-2 text-center" x-data="{ showMessage: true }" x-show="showMessage" x-init="setTimeout(() => showMessage = false, 6000)">                   
                         {{ $errors->first('name') }}</span>
                                        @endif
                    </div>

                        <div>
                            <label for="email" class="block mb-2 text-sm font-bold text-white">Your email</label>
                            <input type="email" id="email" name="email"
                             class="shadow-sm bg-gray-50 border
                              border-gray-300 text-gray-900 text-sm rounded-lg
                               focus:ring-primary-500 focus:border-primary-500 
                               block w-full p-2.5 dark:bg-gray-700
                                dark:border-gray-600 dark:placeholder-gray-400
                                 dark:text-white dark:focus:ring-primary-500
                                  dark:focus:border-primary-500 dark:shadow-sm-light" 
                                  value="{{ old('email') }}" placeholder="name@mail.com" required>
                            @if ($errors->has('email'))
                            <span class="bg-red-500 text-white my-2 rounded-lg text-sm
                                    p-2 text-center" x-data="{ showMessage: true }" x-show="showMessage" x-init="setTimeout(() => showMessage = false, 6000)">
                            {{ $errors->first('email') }}</span>
                        @endif
                          </div>

                          <div>
                            <label for="phone" class="block mb-2 text-sm font-bold text-white">Phone</label>
                            <input type="text" id="phone" name="phone" class="block p-3 w-full text-sm
                             text-gray-900 bg-gray-50 rounded-lg border border-gray-300 
                             shadow-sm focus:ring-primary-500 focus:border-primary-500
                              dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400
                               dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 
                               dark:shadow-sm-light" placeholder="Your phone"
                               value="{{ old('phone') }}" required>
                            @if ($errors->has('phone'))
                            <span class="bg-red-500 text-white my-2 rounded-lg text-sm
                            p-2 text-center" x-data="{ showMessage: true }" x-show="showMessage" x-init="setTimeout(() => showMessage = false, 6000)">
                            {{ $errors->first('phone') }}</span>
                        @endif
                          </div>

                        <div>
                            <label for="subject" class="block mb-2 text-sm font-bold text-white">Subject</label>
                            <input type="text" id="subject" name="subject"
                             class="block p-3 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border
                              border-gray-300 shadow-sm focus:ring-primary-500 focus:border-primary-500
                               dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white
                                dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light"
                                 placeholder="Let us know how we can help you" value="{{ old('subject') }}" required>
                            @if ($errors->has('subject'))
                            <span class="bg-red-500 text-white my-2 rounded-lg text-sm
                            p-2 text-center" x-data="{ showMessage: true }" x-show="showMessage" x-init="setTimeout(() => showMessage = false, 6000)">
                            {{ $errors->first('subject') }}</span>
                        @endif
                          </div>
                        <div class="sm:col-span-2">
                            <label for="message" class="block mb-2 text-sm font-bold text-white">Your message</label>
                            <textarea id="message" name="message"  rows="6" class="block p-2.5 w-full text-sm
                             text-gray-900 bg-gray-50 rounded-lg shadow-sm border
                              border-gray-300 focus:ring-primary-500 focus:border-primary-500
                               dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400
                                dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                 placeholder="Leave a comment...">{{ old('message') }}</textarea>
                            @if ($errors->has('message'))
                            <span class="bg-red-500 text-white my-2 rounded-lg text-sm
                                    p-2 text-center " x-data="{ showMessage: true }" x-show="showMessage" x-init="setTimeout(() => showMessage = false, 6000)">
                                    {{ $errors->first('message') }}</span>
                        @endif
                          </div>
                        <button type="submit" class="py-3 px-5 text-sm
                         font-medium text-center text-white rounded-lg
                          bg-primary-700 sm:w-fit hover:bg-primary-800 
                          focus:ring-4 focus:outline-none focus:ring-primary-300
                           dark:bg-primary-600 dark:hover:bg-primary-700
                            dark:focus:ring-primary-800 
                            transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110">Send message</button>
                    </form>
                </div>
             
  
             
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Section: Design Block -->
  
  </div>
  <!-- Container for demo purpose -->

    @endsection

   

    