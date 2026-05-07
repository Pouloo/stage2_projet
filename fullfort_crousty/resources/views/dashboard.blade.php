<!-- Vue du dashboard utilisateur -->
<style>
    div.py-12 > div
    {
        margin-bottom: 20px;
        border: 2px solid black;
        border-radius: 10px;
        background-color: #dddddd;
        font-weight: 10;
        font-size: 30px;
    }
    span
    {
        font-weight: 900;
        font-size: 35px;
        margin-left: 15px;
    }
</style>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Vue d\'ensemble') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 text-gray-900 dark:text-gray-100">Produits Commandés: <span>{{$order_count}}</span></div>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 text-gray-900 dark:text-gray-100">Produits en cours de livraison: <span>{{$order_pending_count}}</span></div>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 text-gray-900 dark:text-gray-100">Produits Livrés: <span>{{$order_delivered_count}}</span></div>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 text-gray-900 dark:text-gray-100">Produits Prépayés: <span>{{$order_paid_count}}</span></div>
    </div>
</x-app-layout>
