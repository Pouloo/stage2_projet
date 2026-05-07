<!-- Affichage des commandes des tous les utilisateurs; C'est à partir de cette vue que se fait le changement de statut de la commande -->
@extends('admin.design')

@section('show_orders')

    <table style="width: 100%; font-family: Arial, sans-serif; border-collapse: collapse;">
        <thead>
            <tr style="background-color: #f2f2f2;">
                <th style="padding: 12px; text-align: left; border: 1px solid #dddddd;">Nom Utilisateur</th>
                <th style="padding: 12px; text-align: left; border: 1px solid #dddddd;">Adresse Client</th>
                <th style="padding: 12px; text-align: left; border: 1px solid #dddddd;">Téléphone Client</th>
                <th style="padding: 12px; text-align: left; border: 1px solid #dddddd;">Nom Produit</th>
                <th style="padding: 12px; text-align: left; border: 1px solid #dddddd;">Prix Produit</th>
                <th style="padding: 12px; text-align: left; border: 1px solid #dddddd;">Image Produit</th>
                <th style="padding: 12px; text-align: left; border: 1px solid #dddddd;">Statut Paiement</th>
                <th style="padding: 12px; text-align: left; border: 1px solid #dddddd;">Statut Livraison</th>
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
                    <td style="padding: 12px;">
                        @if ($order_product->payment_status == 'cash-on-delivery')
                            <b>Paiement à la livraison</b>
                        @elseif ($order_product->order_status == 'prepaid')
                            <b>Prépayé</b>
                        @endif
                    </td>
                    <td style="padding: 12px;">
                        <!-- Formulaire responsable de du statut des commandes respectives -->
                        Statut Actuel:
                        @if ($order_product->order_status == 'pending')
                            <b style="padding: 12px; color: blue;">En Cours de Livraison...</b>
                        @elseif ($order_product->order_status == 'delivered')
                            <b style="padding: 12px; color: green;">Livré ✓</b>
                        @endif
                        <form action="{{route('admin.order.status', $order_product->id)}}" method="post">
                            @csrf
                            <select name="status">
                                <option value="delivered">Livré</option>
                                <option value="pending">En Cours de Livraison</option>
                            </select>
                            <input type="submit" name="submit" value="Modifier" onclick="return confirm('Veuillez confirmer le changement de statut.')" style="background-color: turquoise; color: white;">
                        </form>
                    </td>
                </tr>
            @endforeach

            {{$order_products->links()}}
        </tbody>
    </table>

@endsection