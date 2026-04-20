<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Produits Commandés') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <table style="width: 100%; font-family: Arial, sans-serif; border-collapse: collapse;">
                        <thead>
                            <tr style="background-color: #f2f2f2;">
                                <th style="padding: 12px; text-align: left; border: 1px solid #dddddd;">Nom Utilisateur</th>
                                <th style="padding: 12px; text-align: left; border: 1px solid #dddddd;">Adresse Client</th>
                                <th style="padding: 12px; text-align: left; border: 1px solid #dddddd;">Téléphone Client</th>
                                <th style="padding: 12px; text-align: left; border: 1px solid #dddddd;">Nom Produit</th>
                                <th style="padding: 12px; text-align: left; border: 1px solid #dddddd;">Prix Produit</th>
                                <th style="padding: 12px; text-align: left; border: 1px solid #dddddd;">Image Produit</th>
                                <th style="padding: 12px; text-align: left; border: 1px solid #dddddd;">Statut</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($order_products as $order_product)
                                <tr style="border-bottom: 1px solid #dddddd;">
                                    <td style="padding: 12px;">{{$order_product->user->name}}</td>
                                    <td style="padding: 12px;">{{$order_product->client_address}}</td>
                                    <td style="padding: 12px;">{{$order_product->client_phone}}</td>
                                    <td style="padding: 12px;">{{$order_product->product->name}}</td>
                                    <td style="padding: 12px;">{{$order_product->product->price}}</td>
                                    <td style="padding: 12px;"><img src="{{asset('product_img/'.$order_product->product->image)}}" style="width: 150px;"></td>
                                    @if ($order_product->status == 'pending')
                                        <td style="padding: 12px; color: blue;">En Cours de Livraison...</td>
                                    @elseif ($order_product->status == 'delivered')
                                        <td style="padding: 12px; color: green;">Livré ✓</td>
                                    @endif
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
