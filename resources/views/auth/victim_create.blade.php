@extends('layouts.app')

@section('title', 'Add New Victim')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-blue-50 to-white py-6 px-4">
    <div class="max-w-3xl mx-auto">
        <!-- Header -->
        <div class="text-center mb-6">
            <h1 class="text-2xl font-bold text-blue-900 mb-2">Add New Victim</h1>
            <p class="text-sm text-blue-600">Please fill in the victim's information below</p>
            <div class="w-16 h-1 bg-blue-500 mx-auto mt-3"></div>
        </div>

        <!-- Main Form Container -->
        <div class="bg-white rounded-xl shadow-xl border border-blue-100">
            <!-- Form Header -->
            <div class="bg-gradient-to-r from-blue-500 to-blue-600 rounded-t-xl px-6 py-4">
                <h2 class="text-base font-semibold text-white flex items-center">
                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M14,2H6A2,2 0 0,0 4,4V20A2,2 0 0,0 6,22H18A2,2 0 0,0 20,20V8L14,2M18,20H6V4H13V9H18V20Z"/>
                    </svg>
                    Victim Information Form
                </h2>
            </div>

            <!-- Form Body -->
            <div class="p-6">
                <form method="POST" action="{{ route('victims.store') }}" enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    
                    <!-- Personal Information Section -->
                    <div class="bg-blue-50/50 rounded-lg border border-blue-100 overflow-hidden">
                        <div class="bg-blue-100 px-4 py-2 border-b border-blue-200">
                            <h3 class="text-sm font-semibold text-blue-900 flex items-center">
                                <svg class="w-4 h-4 mr-2 text-blue-600" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 2C13.1 2 14 2.9 14 4C14 5.1 13.1 6 12 6C10.9 6 10 5.1 10 4C10 2.9 10.9 2 12 2ZM21 9V7L15 1.5C14.5 1.1 13.7 1.1 13.2 1.5L7 7V9H9V16C9 17.1 9.9 18 11 18V22H13V18C14.1 18 15 17.1 15 16V9H21Z"/>
                                </svg>
                                Personal Information
                            </h3>
                        </div>
                        
                        <div class="p-4 space-y-4">
                            <!-- Name Field -->
                            <div>
                                <label for="name" class="block text-xs font-semibold text-blue-900 mb-1">
                                    Full Name <span class="text-red-500">*</span>
                                </label>
                                <div class="relative">
                                    <input type="text" 
                                           name="name" 
                                           id="name" 
                                           value="{{ old('name') }}" 
                                           class="w-full px-3 py-2 text-sm border border-blue-200 rounded-lg bg-white focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all @error('name') border-red-400 bg-red-50 @enderror" 
                                           required
                                           placeholder="Enter full name">
                                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                        <svg class="h-4 w-4 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                        </svg>
                                    </div>
                                </div>
                                @error('name')
                                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <!-- ID Number Field -->
                                <div>
                                    <label for="id_number" class="block text-xs font-semibold text-blue-900 mb-1">ID Number</label>
                                    <div class="relative">
                                        <input type="text" 
                                               name="id_number" 
                                               id="id_number" 
                                               value="{{ old('id_number') }}" 
                                               class="w-full px-3 py-2 text-sm border border-blue-200 rounded-lg bg-white focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all @error('id_number') border-red-400 bg-red-50 @enderror"
                                               placeholder="National ID or Passport">
                                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                            <svg class="h-4 w-4 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2"></path>
                                            </svg>
                                        </div>
                                    </div>
                                    @error('id_number')
                                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                                
                                <!-- Phone Field -->
                                <div>
                                    <label for="phone" class="block text-xs font-semibold text-blue-900 mb-1">Phone Number</label>
                                    <div class="relative">
                                        <input type="text" 
                                               name="phone" 
                                               id="phone" 
                                               value="{{ old('phone') }}" 
                                               class="w-full px-3 py-2 text-sm border border-blue-200 rounded-lg bg-white focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all @error('phone') border-red-400 bg-red-50 @enderror"
                                               placeholder="+250 xxx xxx xxx">
                                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                            <svg class="h-4 w-4 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                            </svg>
                                        </div>
                                    </div>
                                    @error('phone')
                                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            
                            <!-- ID Image Upload Field -->
                            <div>
                                <label for="id_image" class="block text-xs font-semibold text-blue-900 mb-1">ID Document Image</label>
                                <div class="relative">
                                    <input type="file" 
                                           name="id_image" 
                                           id="id_image" 
                                           accept="image/jpeg,image/png,image/jpg,image/gif"
                                           class="w-full px-3 py-2 text-xs border border-blue-200 rounded-lg bg-white focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all file:mr-4 file:py-1 file:px-3 file:rounded file:border-0 file:text-xs file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 @error('id_image') border-red-400 bg-red-50 @enderror"
                                           onchange="previewImage(event)">
                                </div>
                                <p class="mt-1 text-xs text-blue-500">JPG, PNG, GIF (Max: 2MB)</p>
                                @error('id_image')
                                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                                @enderror
                                
                                <!-- Image Preview -->
                                <div id="image-preview" class="mt-3 hidden">
                                    <p class="text-xs font-semibold text-blue-900 mb-2">Preview:</p>
                                    <img id="preview-img" src="" alt="ID Preview" class="max-w-xs rounded-lg border border-blue-200 shadow-sm">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Violence Information Section -->
                    <div class="bg-blue-50/50 rounded-lg border border-blue-100 overflow-hidden">
                        <div class="bg-blue-100 px-4 py-2 border-b border-blue-200">
                            <h3 class="text-sm font-semibold text-blue-900 flex items-center">
                                <svg class="w-4 h-4 mr-2 text-blue-600" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2M12,4A8,8 0 0,1 20,12A8,8 0 0,1 12,20A8,8 0 0,1 4,12A8,8 0 0,1 12,4M11,6V13H13V6H11M11,15V17H13V15H11Z"/>
                                </svg>
                                Violence Information
                            </h3>
                        </div>
                        
                        <div class="p-4">
                            <div>
                                <label for="violence_type" class="block text-xs font-semibold text-blue-900 mb-1">
                                    Type of Violence <span class="text-red-500">*</span>
                                </label>
                                <div class="relative">
                                    <select name="violence_type" 
                                            id="violence_type" 
                                            class="w-full px-3 py-2 text-sm border border-blue-200 rounded-lg bg-white focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all appearance-none @error('violence_type') border-red-400 bg-red-50 @enderror"
                                            required>
                                        <option value="" disabled {{ old('violence_type') ? '' : 'selected' }}>Select violence type...</option>
                                        <option value="sexual" {{ old('violence_type') == 'sexual' ? 'selected' : '' }}>Sexual violence</option>
                                        <option value="emotional" {{ old('violence_type') == 'emotional' ? 'selected' : '' }}>Emotional/psychological abuse</option>
                                        <option value="physical" {{ old('violence_type') == 'physical' ? 'selected' : '' }}>Physical violence (beating, injury, etc.)</option>
                                        <option value="economic" {{ old('violence_type') == 'economic' ? 'selected' : '' }}>Economic/financial abuse</option>
                                    </select>
                                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                        <svg class="h-4 w-4 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                        </svg>
                                    </div>
                                </div>
                                @error('violence_type')
                                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    
                    <!-- Additional Information Section -->
                    <div class="bg-blue-50/50 rounded-lg border border-blue-100 overflow-hidden">
                        <div class="bg-blue-100 px-4 py-2 border-b border-blue-200">
                            <h3 class="text-sm font-semibold text-blue-900 flex items-center">
                                <svg class="w-4 h-4 mr-2 text-blue-600" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M14,2H6A2,2 0 0,0 4,4V20A2,2 0 0,0 6,22H18A2,2 0 0,0 20,20V8L14,2M18,20H6V4H13V9H18V20Z"/>
                                </svg>
                                Additional Information
                            </h3>
                        </div>
                        
                        <div class="p-4 space-y-4">
                            <!-- Address Field -->
                            <div>
                                <label for="address" class="block text-xs font-semibold text-blue-900 mb-1">Address</label>
                                <textarea name="address" 
                                          id="address" 
                                          rows="3" 
                                          class="w-full px-3 py-2 text-sm border border-blue-200 rounded-lg bg-white focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all resize-none @error('address') border-red-400 bg-red-50 @enderror"
                                          placeholder="Enter complete address...">{{ old('address') }}</textarea>
                                @error('address')
                                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <!-- Other Details Field -->
                            <div>
                                <label for="other_details" class="block text-xs font-semibold text-blue-900 mb-1">Other Details</label>
                                <textarea name="other_details" 
                                          id="other_details" 
                                          rows="3" 
                                          class="w-full px-3 py-2 text-sm border border-blue-200 rounded-lg bg-white focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all resize-none @error('other_details') border-red-400 bg-red-50 @enderror"
                                          placeholder="Additional information, notes, or special circumstances...">{{ old('other_details') }}</textarea>
                                @error('other_details')
                                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    
                    <!-- Action Buttons -->
                    <div class="flex flex-col sm:flex-row gap-3 pt-2">
                        <button type="submit" 
                                class="flex-1 bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white text-sm font-semibold py-3 px-6 rounded-lg transition-all duration-300 shadow-md hover:shadow-lg transform hover:-translate-y-0.5">
                            <span class="inline-flex items-center justify-center">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                Submit Information
                            </span>
                        </button>
                        
                        <a href="{{ route('victims.index') }}" 
                           class="flex-1 bg-white hover:bg-gray-50 text-blue-700 text-sm font-semibold py-3 px-6 rounded-lg border-2 border-blue-200 hover:border-blue-300 transition-all duration-300 shadow-sm hover:shadow text-center">
                            <span class="inline-flex items-center justify-center">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                                </svg>
                                Cancel
                            </span>
                        </a>
                    </div>
                </form>
            </div>
        </div>
        
        <!-- Help Text -->
        <div class="mt-4 text-center bg-white rounded-lg border border-blue-100 p-3 shadow-sm">
            <p class="text-xs text-blue-700 font-medium">
                <span class="text-red-500">*</span> Required fields must be completed before submission
            </p>
            <p class="text-xs text-blue-500 mt-1">All information provided will be kept strictly confidential</p>
        </div>
    </div>
</div>

<script>
function previewImage(event) {
    const file = event.target.files[0];
    const preview = document.getElementById('image-preview');
    const previewImg = document.getElementById('preview-img');
    
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            previewImg.src = e.target.result;
            preview.classList.remove('hidden');
        }
        reader.readAsDataURL(file);
    } else {
        preview.classList.add('hidden');
    }
}
</script>
@endsection