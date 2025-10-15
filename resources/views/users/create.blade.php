@extends('layouts.app')

@section('title', 'Create New User')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-slate-50 to-blue-50 py-8 px-4">
    <div class="max-w-4xl mx-auto">
        <!-- Header -->
        <div class="text-center mb-10">
            <h1 class="text-4xl font-bold text-slate-800 mb-3">Create New User</h1>
            <p class="text-lg text-slate-600">Add a new user to the system</p>
            <div class="w-24 h-1 bg-blue-600 mx-auto mt-4"></div>
        </div>

        <!-- Main Form Container -->
        <div class="bg-white border-2 border-slate-200 shadow-2xl">
            <!-- Form Header -->
            <div class="bg-slate-50 border-b-2 border-slate-200 px-8 py-6">
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <div class="w-3 h-3 bg-blue-600 mr-3"></div>
                        <h2 class="text-xl font-semibold text-slate-800">User Registration Form</h2>
                    </div>
                    <a href="{{ route('users.index') }}" 
                       class="inline-flex items-center px-4 py-2 bg-slate-600 hover:bg-slate-700 text-white text-sm font-semibold transition-colors duration-200">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        Back to List
                    </a>
                </div>
            </div>

            <!-- Form Body -->
            <div class="p-8 lg:p-12">
                <form method="POST" action="{{ route('users.store') }}" class="space-y-10">
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
                                
                                <!-- Email Field -->
                                <div class="lg:col-span-2">
                                    <label for="email" class="block text-sm font-bold text-slate-700 mb-3">
                                        Email Address <span class="text-red-600 text-lg">*</span>
                                    </label>
                                    <div class="relative">
                                        <input type="email" 
                                               name="email" 
                                               id="email" 
                                               value="{{ old('email') }}" 
                                               class="w-full px-4 py-4 border-2 border-slate-300 bg-white focus:border-blue-500 focus:ring-0 transition-all duration-300 text-slate-700 font-medium @error('email') border-red-500 bg-red-50 @enderror"
                                               required
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

                                <!-- Role Field -->
                                <div class="lg:col-span-2">
                                    <label for="role" class="block text-sm font-bold text-slate-700 mb-3">
                                        User Role <span class="text-red-600 text-lg">*</span>
                                    </label>
                                    <div class="relative">
                                        <select name="role" 
                                                id="role" 
                                                class="w-full px-4 py-4 border-2 border-slate-300 bg-white focus:border-blue-500 focus:ring-0 transition-all duration-300 text-slate-700 font-medium appearance-none @error('role') border-red-500 bg-red-50 @enderror"
                                                required>
                                            <option value="" disabled {{ old('role') ? '' : 'selected' }}>Select user role...</option>
                                            <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Administrator</option>
                                            <option value="investigator" {{ old('role') == 'investigator' ? 'selected' : '' }}>Investigator</option>
                                            <option value="doctor" {{ old('role') == 'doctor' ? 'selected' : '' }}>Doctor</option>
                                            <option value="counselor" {{ old('role') == 'counselor' ? 'selected' : '' }}>Counselor</option>
                                            <option value="legal_officer" {{ old('role') == 'legal_officer' ? 'selected' : '' }}>Legal Officer</option>
                                            <option value="gbv_officer" {{ old('role') == 'gbv_officer' ? 'selected' : '' }}>GBV Officer</option>
                                            <option value="social_worker" {{ old('role') == 'social_worker' ? 'selected' : '' }}>Social Worker</option>
                                        </select>
                                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                            <svg class="h-5 w-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                            </svg>
                                        </div>
                                    </div>
                                    @error('role')
                                        <p class="mt-2 text-sm text-red-600 font-medium">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Password Section -->
                    <div class="border-2 border-slate-100 bg-slate-50/50">
                        <div class="bg-slate-100 border-b-2 border-slate-200 px-6 py-4">
                            <h3 class="text-lg font-bold text-slate-700 flex items-center">
                                <svg class="w-5 h-5 mr-2 text-blue-600" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12,17A2,2 0 0,0 14,15C14,13.89 13.1,13 12,13A2,2 0 0,0 10,15A2,2 0 0,0 12,17M18,8A2,2 0 0,1 20,10V20A2,2 0 0,1 18,22H6A2,2 0 0,1 4,20V10C4,8.89 4.9,8 6,8H7V6A5,5 0 0,1 12,1A5,5 0 0,1 17,6V8H18M12,3A3,3 0 0,0 9,6V8H15V6A3,3 0 0,0 12,3Z"/>
                                </svg>
                                Security Information
                            </h3>
                        </div>
                        
                        <div class="p-6">
                            <div class="space-y-6">
                                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                                    <!-- Password -->
                                    <div>
                                        <label for="password" class="block text-sm font-bold text-slate-700 mb-3">
                                            Password <span class="text-red-600 text-lg">*</span>
                                        </label>
                                        <div class="relative">
                                            <input type="password" 
                                                   name="password" 
                                                   id="password" 
                                                   class="w-full px-4 py-4 border-2 border-slate-300 bg-white focus:border-blue-500 focus:ring-0 transition-all duration-300 text-slate-700 font-medium @error('password') border-red-500 bg-red-50 @enderror"
                                                   required
                                                   placeholder="Enter password (min. 8 characters)">
                                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                                <svg class="h-5 w-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                                </svg>
                                            </div>
                                        </div>
                                        @error('password')
                                            <p class="mt-2 text-sm text-red-600 font-medium">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Confirm Password -->
                                    <div>
                                        <label for="password_confirmation" class="block text-sm font-bold text-slate-700 mb-3">
                                            Confirm Password <span class="text-red-600 text-lg">*</span>
                                        </label>
                                        <div class="relative">
                                            <input type="password" 
                                                   name="password_confirmation" 
                                                   id="password_confirmation" 
                                                   class="w-full px-4 py-4 border-2 border-slate-300 bg-white focus:border-blue-500 focus:ring-0 transition-all duration-300 text-slate-700 font-medium"
                                                   required
                                                   placeholder="Confirm password">
                                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                                <svg class="h-5 w-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Password Requirements -->
                                <div class="bg-blue-50 border-l-4 border-blue-500 p-4">
                                    <div class="flex">
                                        <div class="flex-shrink-0">
                                            <svg class="h-5 w-5 text-blue-400" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                                            </svg>
                                        </div>
                                        <div class="ml-3">
                                            <h4 class="text-sm font-bold text-blue-800">Password Requirements</h4>
                                            <div class="mt-2 text-sm text-blue-700">
                                                <ul class="list-disc list-inside space-y-1">
                                                    <li>Minimum 8 characters long</li>
                                                    <li>Both passwords must match</li>
                                                    <li>Use a strong, unique password</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                    </svg>
                                    Create User
                                </span>
                            </button>
                            
                            <a href="{{ route('users.index') }}" 
                               class="bg-slate-600 hover:bg-slate-700 border-2 border-slate-600 hover:border-slate-700 text-white font-bold py-4 px-10 text-center transition-all duration-300 transform hover:scale-105 focus:outline-none focus:ring-4 focus:ring-slate-200 shadow-lg">
                                <span class="inline-flex items-center">
                                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
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
            <p class="text-xs text-slate-500 mt-2">User will receive login credentials via email after creation</p>
        </div>
    </div>
</div>
@endsection