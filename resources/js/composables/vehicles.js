import { ref } from "vue";
import axios from "axios";
import { useRouter } from "vue-router";

export default function useVehicles() {
    const vehicle = ref([]);
    const vehicles = ref([]);
    const errors = ref("");
    const router = useRouter();

    const getVehicle = async (id) => {
        let response = await axios.get("/api/vehicles/" + id);
        vehicle.value = response.data.data;
    };

    const getVehicles = async () => {
        let response = await axios.get("/api/vehicles");
        vehicles.value = response.data.data;
    };

    const storeVehicle = async (data) => {
        errors.value = "";
        try {
            await axios.post("/api/vehicles", data);
            await router.push({ name: "vehicles.index" });
        } catch (e) {
            console.log(e);
            if (e.response.status == 422) {
                errors.value = e;
            }
        }
    };

    const updateVehicle = async (id) => {
        errors.value = "";
        try {
            await axios.put("/api/vehicles/" + id, vehicle.value);
            await router.push({ name: "vehicles.index" });
        } catch (e) {
            if (e.response.status === 422) {
                errors.value = e.response.data.errors;
            }
        }
    };

    const destroyVehicle = async (id) => {
        await axios.delete("/api/vehicles/" + id);
    };

    return {
        vehicles,
        getVehicles,
        getVehicle,
        storeVehicle,
        destroyVehicle,
        updateVehicle,
        vehicle,
        errors,
    };
}
