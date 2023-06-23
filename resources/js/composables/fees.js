import { ref } from "vue";
import axios from "axios";
import { useRouter } from "vue-router";

export default function useFees() {
    const fee = ref([]);
    const fees = ref([]);
    const errors = ref("");
    const router = useRouter();

    const getFee = async (id) => {
        let response = await axios.get("/api/fees/" + id);
        fee.value = response.data.data;
    };

    const getFees = async () => {
        let response = await axios.get("/api/fees");
        fees.value = response.data.data;
    };

    const storeFee = async (data) => {
        errors.value = "";
        try {
            await axios.post("/api/fees", data);
            await router.push({ name: "fees.index" });
        } catch (e) {
            console.log(e);
            if (e.response.status == 422) {
                errors.value = e;
            }
        }
    };

    const updateFee = async (id) => {
        errors.value = "";
        try {
            await axios.put("/api/fees/" + id, fee.value);
            await router.push({ name: "fees.index" });
        } catch (e) {
            if (e.response.status === 422) {
                errors.value = e.response.data.errors;
            }
        }
    };

    const destroyFee = async (id) => {
        await axios.delete("/api/fees/" + id);
    };

    return {
        fees,
        getFees,
        getFee,
        storeFee,
        destroyFee,
        updateFee,
        fee,
        errors,
    };
}
