import { ref } from "vue";
import axios from "axios";
import { useRouter } from "vue-router";

export default function useOwners() {
    const owner = ref([]);
    const owners = ref([]);
    const errors = ref('');
    const router = useRouter();

    const getOwners = async() => {
        let response = await axios.get('/api/owners');
        owners.value = response.data.data;
    }

    const getOwner = async(id) => {
        let response = await axios.get('/api/owners/' + id);
        owner.value = response.data.data;
    }

    const storeOwner = async(data) => {
        errors.value = '';
        try {
            await axios.post('/api/owners/', data);
            await router.push({name: 'owners.index'})
        } catch (e) {
            console.log(e);
            if (e.response.status == 422) {
                errors.value = e
            }
        }
    }

    const updateOwner = async (id) => {
        errors.value = '';
        try {
            await axios.put('/api/owners/' + id, owner.value);
            await router.push({ name: 'owners.index' });
        } catch (e) {
            if (e.response.status === 422) {
                errors.value = e.response.data.errors
            }
        }
    }

    return {
        owners, 
        owner,
        getOwners,
        getOwner,
        storeOwner,
        updateOwner,
        errors,
    }
}