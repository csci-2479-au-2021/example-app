import { Pet } from "./types/Pet";

export function initPets() {
    return {
        pets: [] as Pet[],
        addPet(name: string) {
            this.pets.push({ name, isFed: false });
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
                return pet.isFed ? 'Mark pet as not fed' : 'Mark pet as fed';
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
        }
    }
};

function getPet(pets: Pet[], name: string): Pet | undefined {
    return pets.find(p => p.name === name);
}
