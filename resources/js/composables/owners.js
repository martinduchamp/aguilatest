import { ref } from "vue";
import axios from "axios";

export default function useOwners() {
    const owners = ref([]);

    const getOwners = async() => {
        let response = await axios.get('/api/owners');
        owners.value = response.data.data;
    }

    return {
        owners, 
        getOwners
    }
}