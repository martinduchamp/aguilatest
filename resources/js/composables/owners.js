import { ref, shallowRef } from "vue";
import axios from "axios";
import { useRouter } from "vue-router";
import { reactive } from "vue";

export default function useOwners() {
    const owner = ref([]);
    const owners = ref([]);
    const errors = ref("");
    const router = useRouter();
    const trailersattach = ref([]);

    const getOwners = async () => {
        let response = await axios.get("/api/owners");
        owners.value = response.data.data;
    };

    const getOwner = async (id) => {
        let response = await axios.get("/api/owners/" + id);

        let arraytrailers = Array();
        for (
            let index = 0;
            index < response.data.data.trailers.length;
            index++
        ) {
            const element = response.data.data.trailers[index];
            arraytrailers[index] = element.id;
        }
        trailersattach.value = arraytrailers;
        owner.value = response.data.data;
    };

    const storeOwner = async (data) => {
        errors.value = "";
        try {
            await axios.post("/api/owners/", data);
            await router.push({ name: "owners.index" });
        } catch (e) {
            console.log(e);
            if (e.response.status == 422) {
                errors.value = e;
            }
        }
    };

    const updateOwner = async (id, data) => {
        errors.value = "";
        try {
            await axios.put("/api/owners/" + id, data);
            await router.push({ name: "owners.index" });
        } catch (e) {
            if (e.response.status === 422) {
                errors.value = e.response.data.errors;
            }
        }
    };

    const destroyOwner = async (id) => {
        await axios.delete("/api/owners/" + id);
    };

    return {
        owners,
        owner,
        getOwners,
        getOwner,
        storeOwner,
        updateOwner,
        destroyOwner,
        trailersattach,
        errors,
    };
}