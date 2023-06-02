import { ref } from "vue";
import axios from "axios";
import { useRouter } from "vue-router";

export default function useTrailers() {
    const trailer = ref([]);
    const trailers = ref([]);
    const errors = ref('');
    const router = useRouter();

    const getTrailers = async() => {
        let response = await axios.get('/api/trailers');
        trailers.value = response.data.data;
    }

    const storeTrailer = async(data) => {
        errors.value = '';
        try {
            await axios.post('/api/trailers/', data);
            await router.push({name: 'trailers.index'})
        } catch (e) {
            console.log(e);
            if (e.response.status == 422) {
                errors.value = e
            }
        }
    }

    return {
        trailers, 
        getTrailers,
        storeTrailer,
        errors
    }
}