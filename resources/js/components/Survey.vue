<!-- <template>
    <form method="post" action="{{ route('answer.store') }}" accept-charset="UTF-8">
        @csrf
        <div class="sondage">
            <p id="duree">Il vous reste {{ $timeLeft }} minutes pour participer au sondage</p>

            <h1>{{ $dernierSondagetitle }}</h1>
            <p>{{ $dernierSondage.description }}</p>
            <p>Choix:</p>

            <div v-for="(reponse, index) in reponses" :key="index" id="conteneur-options">
                <label>{{ reponse.title }}</label>
                <input type="radio" :name="'options[]'" :value="reponse.id" required>
            </div>
            <br>

            <input type="submit" value="Valider">
        </div>
    </form>
</template>

<script>
export default {
    props: ['timeLeft', 'dernierSondage', 'reponses'],
    // ...
}
</script>
 -->