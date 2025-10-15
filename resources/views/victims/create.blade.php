@extends('layouts.app')

@section('title', 'Add New Victim')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-slate-50 to-blue-50 py-8 px-4">
    <div class="max-w-4xl mx-auto">
        <!-- Header -->
        <div class="text-center mb-10">
            <h1 class="text-4xl font-bold text-slate-800 mb-3">Add New Victim</h1>
            <p class="text-lg text-slate-600">Please fill in the victim's information below</p>
            <div class="w-24 h-1 bg-blue-600 mx-auto mt-4"></div>
        </div>

        <!-- Main Form Container -->
        <div class="bg-white border-2 border-slate-200 shadow-2xl">
            <!-- Form Header -->
            <div class="bg-slate-50 border-b-2 border-slate-200 px-8 py-6">
                <div class="flex items-center">
                    <div class="w-3 h-3 bg-blue-600 mr-3"></div>
                    <h2 class="text-xl font-semibold text-slate-800">Victim Information Form</h2>
                </div>
            </div>

            <!-- Form Body -->
            <div class="p-8 lg:p-12">
                <form method="POST" action="{{ route('victims.store') }}" class="space-y-10">
                    @csrf
                    
                    <!-- Personal Information Section -->
                    <div class="border-2 border-slate-100 bg-slate-50/50">
                        <div class="bg-slate-100 border-b-2 border-slate-200 px-6 py-4">
                            <h3 class="text-lg font-bold text-slate-700 flex items-center">
                                <svg class="w-5 h-5 mr-2 text-blue-600" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 2C13.1 2 14 2.9 14 4C14 5.1 13.1 6 12 6C10.9 6 10 5.1 10 4C10 2.9 10.9 2 12 2ZM21 9V7L15 1.5C14.5 1.1 13.7 1.1 13.2 1.5L7 7V9H9V16C9 17.1 9.9 18 11 18V22H13V18C14.1 18 15 17.1 15 16V9H21Z"/>
                                </svg>
                                Personal Information
                            </h3>
                        </div>
                        
                        <div class="p-6 space-y-6">
                            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                                <!-- Name Field -->
                                <div class="lg:col-span-2">
                                    <label for="name" class="block text-sm font-bold text-slate-700 mb-3">
                                        Full Name <span class="text-red-600 text-lg">*</span>
                                    </label>
                                    <div class="relative">
                                        <input type="text" 
                                               name="name" 
                                               id="name" 
                                               value="{{ old('name') }}" 
                                               class="w-full px-4 py-4 border-2 border-slate-300 bg-white focus:border-blue-500 focus:ring-0 transition-all duration-300 text-slate-700 font-medium @error('name') border-red-500 bg-red-50 @enderror" 
                                               required
                                               placeholder="Enter full name">
                                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                            <svg class="h-5 w-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                            </svg>
                                        </div>
                                    </div>
                                    @error('name')
                                        <p class="mt-2 text-sm text-red-600 font-medium">{{ $message }}</p>
                                    @enderror
                                </div>
                                
                                <!-- Phone Field -->
                                <div>
                                    <label for="phone" class="block text-sm font-bold text-slate-700 mb-3">Phone Number</label>
                                    <div class="relative">
                                        <input type="text" 
                                               name="phone" 
                                               id="phone" 
                                               value="{{ old('phone') }}" 
                                               class="w-full px-4 py-4 border-2 border-slate-300 bg-white focus:border-blue-500 focus:ring-0 transition-all duration-300 text-slate-700 font-medium @error('phone') border-red-500 bg-red-50 @enderror"
                                               placeholder="+250 xxx xxx xxx">
                                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                            <svg class="h-5 w-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                            </svg>
                                        </div>
                                    </div>
                                    @error('phone')
                                        <p class="mt-2 text-sm text-red-600 font-medium">{{ $message }}</p>
                                    @enderror
                                </div>
                                
                                <!-- Email Field -->
                                <div>
                                    <label for="email" class="block text-sm font-bold text-slate-700 mb-3">Email Address</label>
                                    <div class="relative">
                                        <input type="email" 
                                               name="email" 
                                               id="email" 
                                               value="{{ old('email') }}" 
                                               class="w-full px-4 py-4 border-2 border-slate-300 bg-white focus:border-blue-500 focus:ring-0 transition-all duration-300 text-slate-700 font-medium @error('email') border-red-500 bg-red-50 @enderror"
                                               placeholder="example@email.com">
                                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                            <svg class="h-5 w-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path>
                                            </svg>
                                        </div>
                                    </div>
                                    @error('email')
                                        <p class="mt-2 text-sm text-red-600 font-medium">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Additional Information Section -->
                    <div class="border-2 border-slate-100 bg-slate-50/50">
                        <div class="bg-slate-100 border-b-2 border-slate-200 px-6 py-4">
                            <h3 class="text-lg font-bold text-slate-700 flex items-center">
                                <svg class="w-5 h-5 mr-2 text-blue-600" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M14,2H6A2,2 0 0,0 4,4V20A2,2 0 0,0 6,22H18A2,2 0 0,0 20,20V8L14,2M18,20H6V4H13V9H18V20Z"/>
                                </svg>
                                Additional Information
                            </h3>
                        </div>
                        
                        <div class="p-6 space-y-6">
                            <!-- Address Field -->
                            <div>
                                <label for="address" class="block text-sm font-bold text-slate-700 mb-3">Address</label>
                                <textarea name="address" 
                                          id="address" 
                                          rows="4" 
                                          class="w-full px-4 py-4 border-2 border-slate-300 bg-white focus:border-blue-500 focus:ring-0 transition-all duration-300 resize-none text-slate-700 font-medium @error('address') border-red-500 bg-red-50 @enderror"
                                          placeholder="Enter complete address...">{{ old('address') }}</textarea>
                                @error('address')
                                    <p class="mt-2 text-sm text-red-600 font-medium">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <!-- Other Details Field -->
                            <div>
                                <label for="other_details" class="block text-sm font-bold text-slate-700 mb-3">Other Details</label>
                                <textarea name="other_details" 
                                          id="other_details" 
                                          rows="4" 
                                          class="w-full px-4 py-4 border-2 border-slate-300 bg-white focus:border-blue-500 focus:ring-0 transition-all duration-300 resize-none text-slate-700 font-medium @error('other_details') border-red-500 bg-red-50 @enderror"
                                          placeholder="Additional information, notes, or special circumstances...">{{ old('other_details') }}</textarea>
                                @error('other_details')
                                    <p class="mt-2 text-sm text-red-600 font-medium">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    
                    <!-- Action Buttons -->
                    <div class="border-t-2 border-slate-200 pt-8">
                        <div class="flex flex-col sm:flex-row gap-4 justify-center">
                            <button type="submit" 
                                    class="bg-blue-600 hover:bg-blue-700 border-2 border-blue-600 hover:border-blue-700 text-white font-bold py-4 px-10 transition-all duration-300 transform hover:scale-105 focus:outline-none focus:ring-4 focus:ring-blue-200 shadow-lg">
                                <span class="inline-flex items-center">
                                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    Submit Information
                                </span>
                            </button>
                            
                            <a href="{{ route('victims.index') }}" 
                               class="bg-slate-600 hover:bg-slate-700 border-2 border-slate-600 hover:border-slate-700 text-white font-bold py-4 px-10 text-center transition-all duration-300 transform hover:scale-105 focus:outline-none focus:ring-4 focus:ring-slate-200 shadow-lg">
                                <span class="inline-flex items-center">
                                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                                    </svg>
                                    Cancel
                                </span>
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        
        <!-- Help Text -->
        <div class="mt-8 text-center bg-white border-2 border-slate-200 p-4">
            <p class="text-sm text-slate-600 font-medium">
                <span class="text-red-600 text-lg">*</span> Required fields must be completed before submission
            </p>
            <p class="text-xs text-slate-500 mt-2">All information provided will be kept strictly confidential</p>
        </div>
    </div>
</div>
@endsection