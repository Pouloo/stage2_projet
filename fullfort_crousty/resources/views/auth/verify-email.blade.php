<link rel="shortcut icon" href="frontend/images/favicon.png" type="image/x-icon">
<title>Vérification Email</title>

<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        {{ __('Vous êtes inscrit! Avant de commencez, vous êtes priés de valider votre address mail en appuyant sur le lien que nous venons de vous envoyer. Si vous n\'avez reçu de mail, appuyer sur le bouton suivant pour le renvoyer.') }}
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
            {{ __('Un nouveau lien de verification a été envoyé.') }}
        </div>
    @endif

    <div class="mt-4 flex items-center justify-between">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <div>
                <x-primary-button>
                    {{ __('Renvoyer Mail de Verification') }}
                </x-primary-button>
            </div>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                {{ __('Se Déconnecter') }}
            </button>
        </form>
    </div>
</x-guest-layout>
