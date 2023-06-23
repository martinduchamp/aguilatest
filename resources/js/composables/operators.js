import { ref } from "vue";
import axios from "axios";
import { useRouter } from "vue-router";

export default function useOperators() {
    const operator = ref([]);
    const operators = ref([]);
    const errors = ref("");
    const router = useRouter();

    const getOperator = async (id) => {
        let response = await axios.get("/api/operators/" + id);
        operator.value = response.data.data;
    };

    const getOperators = async () => {
        let response = await axios.get("/api/operators");
        operators.value = response.data.data;
    };

    const storeOperator = async (data) => {
        errors.value = "";
        try {
            await axios.post("/api/operators", data);
            await router.push({ name: "operators.index" });
        } catch (e) {
            console.log(e);
            if (e.response.status == 422) {
                errors.value = e;
            }
        }
    };

    const updateOperato = async (id) => {
        errors.value = "";
        try {
            await axios.put("/api/operators/" + id, operator.value);
            await router.push({ name: "operators.index" });
        } catch (e) {
            if (e.response.status === 422) {
                errors.value = e.response.data.errors;
            }
        }
    };

    const destroyOperator = async (id) => {
        await axios.delete("/api/operators/" + id);
    };

    return {
        operators,
        getOperators,
        getOperator,
        storeOperator,
        destroyOperator,
        updateOperato,
        operator,
        errors,
    };
}
