import { ref } from "vue";
import axios from "axios";
import { useRouter } from "vue-router";

export default function useOriginsAndDestinations() {
    const origin_and_destination = ref([]);
    const origins_and_destinations = ref([]);
    const errors = ref("");
    const router = useRouter();

    const getOriginAndDestination = async (id) => {
        let response = await axios.get("/api/origin_destinations/" + id);
        origin_and_destination.value = response.data.data;
    };

    const getOriginsAndDestinations = async () => {
        let response = await axios.get("/api/origin_destinations");
        origins_and_destinations.value = response.data.data;
    };

    const storeOriginAndDestination = async (data) => {
        errors.value = "";
        try {
            await axios.post("/api/origin_destinations", data);
            await router.push({ name: "origins_and_destinations.index" });
        } catch (e) {
            console.log(e);
            if (e.response.status == 422) {
                errors.value = e;
            }
        }
    };

    const updateOriginAndDestination = async (id) => {
        errors.value = "";
        try {
            await axios.put("/api/origin_destinations/" + id, origin_and_destination.value);
            await router.push({ name: "origins_and_destinations.index" });
        } catch (e) {
            if (e.response.status === 422) {
                errors.value = e.response.data.errors;
            }
        }
    };

    const destroyOriginAndDestination = async (id) => {
        await axios.delete("/api/origin_destinations/" + id);
    };

    return {
        origins_and_destinations,
        getOriginsAndDestinations,
        getOriginAndDestination,
        storeOriginAndDestination,
        destroyOriginAndDestination,
        updateOriginAndDestination,
        origin_and_destination,
        errors,
    };
}
