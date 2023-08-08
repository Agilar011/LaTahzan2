<x-app-layout>
    {{-- penempatan di layout.app dan navigation-menu --}}
    </x-app-layout>
@extends('Template UI.layouts.admin-sidebar')

@section('content')
    <div class="container">
        <h2>Confirmation</h2>
        <p>Thank you for your purchase. Here are the details of your extended umrah:</p>

        <ul>
            <li>User Name: {{ $extendedUmrah->nama_user }}</li>
            <li>User Phone: {{ $extendedUmrah->No_hp }}</li>
            <!-- Add more details here -->
        </ul>

        <p>If you need any assistance, please contact our support team.</p>
    </div>
@endsection
