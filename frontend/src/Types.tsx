export type Person = {
    name: string,
    role: "subject"|"detective",
    attr: SubjectAttributes|DetectiveAttributes,
    id: number,
}

export type SubjectAttributes = {
    job: string,
    actionCount: number,
    experience?: "intern"|"beginner"|"expert"|"veteran",
    height?: number,
    weight?: number,
    birtdate?: string,
    haircolor: string,
    eyecolor?: string,
}
export type DetectiveAttributes = {
    job: string,
    actionCount: number,
    experience?: "intern"|"beginner"|"expert"|"veteran",
    height?: number,
    weight?: number,
    birtdate?: Date,
    haircolor?: string,
    eyecolor?: string,
}

export type fresp = {
    success: boolean,
    data: Array<any>,
}