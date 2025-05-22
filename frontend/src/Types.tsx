export type Person = {
    name: string,
    role: "subject"|"detective",
    attr: SubjectAttributes|DetectiveAttributes|null
}

export type SubjectAttributes = {}
export type DetectiveAttributes = {}