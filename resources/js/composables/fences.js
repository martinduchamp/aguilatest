import { ref } from "vue";
import axios from "axios";
import { useRouter } from "vue-router";

export default function useCustomers() {
    const fence = ref([]);
    const fences = ref([]);
    const errors = ref("");
    const router = useRouter();

    const getFence = async (id) => {
        let response = await axios.get("/api/fences/" + id);
        fence.value = response.data.data;
    };

    const getFences = async () => {
        let response = await axios.get("/api/fences");
        fences.value = response.data.data;
    };

    const storeFence = async (data) => {
        errors.value = "";
        try {
            await axios.post("/api/fences", data);
            await router.push({ name: "fences.index" });
        } catch (e) {
            console.log(e);
            if (e.response.status == 422) {
                errors.value = e;
            }
        }
    };

    const updateFence = async (id) => {
        errors.value = "";
        try {
            await axios.put("/api/fences/" + id, fence.value);
            await router.push({ name: "fences.index" });
        } catch (e) {
            if (e.response.status === 422) {
                errors.value = e.response.data.errors;
            }
        }
    };

    const destroyFence = async (id) => {
        await axios.delete("/api/fences/" + id);
    };

    return {
        fences,
        getFences,
        getFence,
        storeFence,
        destroyFence,
        updateFence,
        fence,
        errors,
    };
}
