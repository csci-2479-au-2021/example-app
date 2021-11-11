import { Alpine } from "./bootstrap";
import { Pet } from "./types/Pet";

export function initPets() {
    Alpine.data('petlist', () => ({
        pets: [] as Pet[],
        addPet(name: string) {
            this.pets.push({ name, isFed: false, isDeleted: false });
        },
        updateFedPets(event: any, name: string): void {
            const pet = getPet(this.pets, name);

            if (pet !== undefined) {
                pet.isFed = event.target.checked;
            }
        },
        getLabelText(name: string): string {
            const pet = getPet(this.pets, name);

            if (pet !== undefined) {
                return pet.isFed ? 'Mark pet as hungry' : 'Mark pet as satisfied';
            }

            return '';
        },
        isAnyFedPets(): boolean {
            return this.pets.some(p => p.isFed);
        },
        fedPets(): string {
            const pets = this.pets
                .filter(p => p.isFed)
                .map(p => p.name)
                .toString();

            return `Pets you have fed: ${pets}`;
        },
        isPetDeleted(name: string): boolean {
            const pet = getPet(this.pets, name);

            if (pet !== undefined) {
                return pet.isDeleted;
            }

            return true;
        },
        async confirmDelete(name: string, id: number) {
            const shouldDelete = confirm('Are you sure?');
            
            if (shouldDelete) {
                const resp = await window.axios.delete(`http://localhost/api/pets/${id}`);

                if (resp.data.records_deleted === 1) {
                    const pet = getPet(this.pets, name);
                    
                    if (pet !== undefined) {
                        pet.isDeleted = true;
                    }
                }
            }
        }
    }));
};

function getPet(pets: Pet[], name: string): Pet | undefined {
    return pets.find(p => p.name === name);
}
